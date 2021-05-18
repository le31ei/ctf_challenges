const puppeteer = require('puppeteer-core');
const http = require('http');

const LOGIN_URL = process.env.BACKDOOR_URL || "http://web/backdoor2bot_dont_delete.php";
const ADMIN_URL = process.env.ADMIN_URL || "http://web/submit_1bce5f764c10b1c3b7e2bf835cf31247/index.php";
const REFERER_URL = process.env.REFERER_URL || "http://web/admin.php";
const DOMAIN = process.env.HOST || "web";

var num = 0;
var phpsessid = '';

// Bot 单独访问每个页面，所以要获取
// 接口限制，一次获取的 URL 有限制，具体看服务器性能了
const get_urls = async () => {
    try {
        // TODO: 总感觉这个获取方式好复杂啊
        http.get(ADMIN_URL, {
          headers: {
            'Cookie': 'PHPSESSID=' + phpsessid
          }
        }, resp => {
            var respText = [];
            var size = 0;
            resp.on('data', function (data) {
                respText.push(data);
                size += data.length;
            });
            resp.on('end', function () {
                respText = Buffer.concat(respText, size);
                let obj = JSON.parse(respText);
                obj.forEach(async e => {
                    if(e !== "." && e !== ".." && e !== "index.php") {
                        await open_payload_url(`${e.replace(/^http:\/\/[a-zA-Z0-9\.:]+/i, "http://" + DOMAIN)}`);
                    }
                })
            });
        });
    } catch (e) {
        console.error("[-] Get Urls\n", e.stack)
    }

    setTimeout(() => {
        get_urls();
    }, 3000);
}

const get_session = async () => {
    try {
      http.get(LOGIN_URL, resp => {
          var respText = [];
          var size = 0;
          resp.on('data', function (data) {
          });
          resp.on('end', function () {
              phpsessid = resp.headers['set-cookie'][0].slice(10, 42)
              console.log("[+] Got PHP SESSIONID: " + phpsessid)
              get_urls()
          });
      });

    } catch (e) {
        console.error("[-] Get Urls\n", e.stack)
    }
}

const open_payload_url = async (url) => {
    let _num = ++num;
    console.log(`[${_num}] [+] Open Page ${url}`);
    let page;
    try {
        page = await browser.newPage();

        await page.on('error', err => {
            console.error(`[${_num}] [#] Error!`, err);
        });

        await page.on('pageerror', msg => {
            console.error(`[${_num}] [-] Page error : `, msg);
        })

        await page.on('dialog', async dialog => {
            console.debug(`[#] Dialog : [${dialog.type()}] "${dialog.message()}" ${dialog.defaultValue() || ""}`);
            await dialog.dismiss();
        });

        await page.on('console', async msg => {
            msg.args().forEach(arg => {
                arg.jsonValue().then(_arg => {
                    console.log(`[$] Console : `, _arg)
                });
            });
        });

        await page.on('requestfailed', req => {
            console.error(`[-] Request failed : ${req.url()} ${req.failure().errorText}`);
        })

        // ===== Custom Action =====
        // 自定义页面操作

        await page.setCookie({
            name: "PHPSESSID",
            value: phpsessid,
            domain: DOMAIN,
            path: "/",
            httpOnly: false,
            secure: false,
            sameSite: "Lax"
        });

        await page.setExtraHTTPHeaders({
          'Referer': REFERER_URL
        });

        await page.goto(url, {
            waitUntil: 'networkidle2',
        });

        await page.waitFor(5 * 1000);

        // =========================

    } catch (e) {
        console.error("[-] Page open_payload_url\n", e.stack)
    }

    page.close();
    console.log(`[${_num}] [+] Close...`)
}

var browser;

(async () => {

    // 启动 Chrome
    browser = await puppeteer.launch({
        executablePath: '/usr/bin/chromium-browser',
        args: [
            '--headless',
            '--disable-dev-shm-usage',
            '--no-sandbox',
            '--disable-setuid-sandbox',
            '--disable-gpu',
            '--no-gpu',
            '--disable-default-apps',
            '--disable-translate',
            '--disable-device-discovery-notifications',
            '--disable-software-rasterizer',
            '--disable-xss-auditor'
        ],
        userDataDir: '/home/bot/data/',
        // 忽略 HTTPS 错误
        ignoreHTTPSErrors: true
    });

    // 创建一个匿名的浏览器上下文
    // browser = await browser.createIncognitoBrowserContext();

    console.log("[+] Browser", "Launch success!");

    get_session();

    // console.log("[+] Browser", "Close success!");
    // await browser.close();
})();
