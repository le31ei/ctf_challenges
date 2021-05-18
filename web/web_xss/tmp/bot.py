from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys

url = "http://127.0.0.1/mi04dmin.php"
driver = webdriver.PhantomJS('/usr/local/bin/phantomjs')
def visit():
    driver.get(url)
    driver.find_element_by_name('username').send_keys("admin")
    driver.find_element_by_name('password').send_keys("mi0sijidou")
    data = driver.find_element_by_name('submit').click()

    time.sleep(2)
    driver.quit()
if __name__ == '__main__':
    visit()