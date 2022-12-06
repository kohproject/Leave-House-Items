<template>
    <div :class="['loading__wrapper ',{'loading':loadBool}]">
        <p>sending...</p>
        <div class="loading"></div>
    </div>
</template>
<script>
export default {
   name:"loadingSpin",
   props:['loadBool']
}
</script>
<style scoped lang="scss">
div.loading__wrapper{
    z-index: 99999999;
    opacity: .9;
    background:#fff;
    position: fixed;
    display:none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    top:0px; bottom:0px;right:0px;left:0px;
    .loading{
        width:50px;
        height:50px;
        border:solid 14px #666;
         border-right:solid 14px #990000;
        border-top:solid 14px #cc0000;
        border-radius:50px;
        position: relative;
        z-index: 9999999999;
    }
}
@keyframes spin{
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(350deg);
    }

}

div.loading__wrapper.loading{
     display:flex;
      .loading{
          animation: spin .2s infinite;
      }
}

</style>
