<template>
<header><h1>Leaveit @ Leavitt</h1></header>
  <router-view/>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
header{
  height:100px;
  width:100%;
  display:flex;
  flex-direction: column;
  justify-content: center;
  border-bottom:solid 2px #cc0000;
  align-items: center;
  background:#333;
  color:#fff;
  position:fixed;
  top:0px;
  z-index: 99;
  h1{
    font-size:50px;
  }
}
</style>
