<template>
  <div class="wrapper__photo-block">
    <div class="wrap">
      <img :src="photosrc" />
    </div>
    <div class="wrap">
      <a href="javascript:void(0)"> <em></em> [view photo]</a>
    </div>
  </div>
</template>
<script>
export default {
  name: "photoBlock",
  props: ["photosrc"],
};
</script>

<style lang="scss" scoped>
.wrapper__photo-block {
  width: 96%;
  position: relative;
  padding: 5px 2px 5px 1px;
  margin: auto;
  overflow: hidden;

  .wrap {
    display: flex;
    flex-direction: row;
    width: 100%;
    margin-top: 1px;
    padding: 4px 5px;
    background: #ccc;
    a {
      position: relative;
      display: flex;
      white-space: nowrap;
      clear: both;
      em {
        display: block;
        width: 12px;
        height: 12px;
        border: solid 2px #333;
        border-radius: 12px;
        position: relative;
        margin: 4px 3px 4px 1px;
        &:before {
          content: "";
          display: block;
          width: 9px;
          height: 3px;
          background: #333;
          position: absolute;
          top: 15px;
          left: 8px;
          border-radius: 2px;
          transform: rotate(55deg);
        }
        &:after {
          content: "+";
          display: block;
          position: absolute;
          font-style: normal;
          color: #999;
          top: -5px;
          left: 1px;
        }
      }
    }
  }
  .wrap:nth-child(2) {
    padding-right: 2px;
    background: #ffffcc;
  }
  .wrap>img {
    background-color: #ccc;
    width: 60px;
    height: 60px;
    margin-left: auto;
    margin-right:auto;
  }
}
</style>