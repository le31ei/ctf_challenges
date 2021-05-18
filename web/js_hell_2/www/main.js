fetch('./main.wasm').then(response =>
  response.arrayBuffer()
).then(bytes => WebAssembly.instantiate(bytes)).then(results => {
  instance = results.instance;

  document.getElementsByTagName('button')[0].addEventListener('click', () => {
    var i8 = new Uint8Array(instance.exports.memory.buffer)
    for (var i = 0; i < flag.value.length; i ++ ) {
        i8[i] = flag.value.charCodeAt(i)
    }

    if ( instance.exports.calc(0) ) {
      alert("you got it!!!");
    } else {
      alert("fuck off...");
    }
  });
  
}).catch(console.error);
