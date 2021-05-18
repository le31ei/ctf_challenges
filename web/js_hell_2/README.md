# 题目：简单js-2

### 题目描述：简单js-2

### 题目难度： 🌟🌟

### 维护：le31ei

### KEY: `flag{f2db67c3251348b9d5116409ab386acd}`

### 配置信息： 
1. 开放端口： `8080`

### 解题过程：

1. 解码main.wasm文件，文件源码如下：

```c
#define WASM_EXPORT __attribute__((visibility("default")))

// flag{f2db67c3251348b9d5116409ab386acd}

const char * target = "2912fg69bla6df{345b7b8}a3c31c54a1608dd";

int map[] = {4,
 9,
 23,
 5,
 14,
 13,
 0,
 37,
 8,
 11,
 19,
 28,
 26,
 3,
 17,
 2,
 15,
 30,
 35,
 20,
 7,
 36,
 29,
 32,
 27,
 6,
 16,
 34,
 1,
 31,
 18,
 24,
 21,
 33,
 10,
 25,
 12,
 22};

WASM_EXPORT
int calc(char *flag) {
  if (strlen(flag) != 38) {
    return 0;
  }
  
  for (int i = 0; i < 38; i++ ) {
    if (flag[i] != target[map[i]]) {
      return 0;
    }
  }

  return 1;
}

```
