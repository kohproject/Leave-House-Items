<template>
  <div :class="['modal__full-wrapper', { sho: modalBool }]">
    <div class="modal">
      <div class="modal-inner">
        <div v-show="!listBool" class="modal__img-wrap" :style="{'backgroundImage':'url('+smallPhoto+')'}">
            
           <img v-show="!listBool" class="img__modal-photo" :src="photoSrc" /> 
         
        </div>
        <div class="wrap__list-final" v-show="listBool">
          <h2>{{ title }} <span class="spNumlist">{{sListNum}}</span> item(s)</h2>
          <ul>
            <li v-for="(itm, index) in sList" :key="index">
              <span class="sItem">{{ itm.item }}</span> |
              <span class="sPrice" :class="{ freeItm: itm.price === 'FREE' }">{{
                itm.price
              }}</span>
            </li>
            <li class="li__total-line">
              <span class="sItem">Total:</span> |
              <span class="sPrice" :data-price="priceTotal"></span>
            </li>
          </ul>
          <button class="btn__sendfinal" @click="sendFinal">
            Submit Final List
          </button>
        </div>
      </div>
      <a
        class="link__close-modal"
        @click="$emit('closeModal')"
        href="javascript:void(0)"
      ></a>
    </div>
  </div>
</template>
<script>
export default {
  name: "modalPhoto",
  props: ["photoSrc", "smallPhoto","modalBool", "listBool", "sList", "priceTotal","sListNum"],
  data() {
    return {
      title: "Check List | ",
    };
  },
  methods: {
    sendFinalEmail: function (_val) {
      document.getElementById("mess").value = _val;
      document.getElementById("formx").submit();
      this.$emit('setLoading');

      return true;
    },

    sendFinal: function () {
   
        var $final = [];
        this.sList.forEach((itm) => {
          $final.push(itm.item);
        });

        $final = $final.join(",");
        $final = $final + " --finalprice:" + this.priceTotal;

        if (this.sendFinalEmail($final)) {
          this.$emit("closeModal");
          // window.location = "http://www.disney.com";
        }
      }
    }
  }

</script>
<style lang="scss" scoped type="text/css">

.spNumlist{
  width:30px;height:30px;background:#cc0000;color:#fff;
  border-radius:30px;
  box-sizing:border-box;
  font-size:20px;
  overflow:hidden;
  padding-top:3px;
  display:inline-block;
}
.modal__full-wrapper {
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  display: none;
  z-index: 99999;
  &:before {
    content: "";
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    background: #fff;
    opacity: 0.9;
    z-index: -1;
  }
  .modal {
    width: 96%;
    min-width:300px;
    max-width: 940px;
    background: #333;
    color: #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    min-height: 640px;
    z-index: 2;
    transform: translate(-50%,-50%);
    .modal-inner {
      position: relative;
      overflow-x:hidden;
      overflow-y:auto;
      h2 {
        border-bottom: dashed 1px #fff;
        padding-bottom: 12px;
      }
      .modal__img-wrap{
        width:auto;
        height:auto;
        min-width:200px;
        max-width:635px;
        max-height:605px;
        position: relative;
        margin:auto;
        min-height:500px;
        overflow:hidden;
        background-repeat: no-repeat;
        background-size:cover;
        background-position:center center;
        z-index: 9999;
        &:after{
            content:'loading...';
            position: absolute;
            z-index: -1;color:#fff;
            left:50%;
            top:20%;
            font:normal 40px helvetica;
            transform:translateX(-50%);
        }
        >img{
          position: relative;
          z-index: 9999;
        }
       
      }
      .wrap__list-final {
        overflow: hidden;
        padding: 5%;
        width: 90%;
        background: #444;
        margin: auto;
        margin-top: 50px;
        margin-top: 70px;
        button.btn__sendfinal {
          min-width: 330px;
          height: 60px;
          border: none;
          font-size: 20px;
          background: #cc0000;
          color: #fff;
          border-radius: 12px;
          &:hover {
            opacity: 0.75;
            cursor: pointer;
            transition: all 0.2s ease;
            transform: scale(1.05);
          }
        }
        ul {
          margin-left: auto;
          margin-right:auto;
          min-width:320px;
          max-width:420px;
          width: 56%;
          margin-bottom: 40px;

          li {
            text-align: left;
            padding-top:3px;
            padding-bottom:3px;
            border-bottom:solid 1px #666;
            span.sItem {
              width: 200px;
              display: inline-block;
            }
            span.sPrice {
              padding-left: 20px;
              &:before {
                content: "$";
              }
              &:after {
                content: attr(data-price);
              }
            }
            span.sPrice.freeItm {
              &:before {
                content: "";
              }
            }
          }
          li.li__total-line {
            background: #fffccc;
            list-style: none;
            color: #333;
            margin-top: 15px;
            padding: 14px 20px 14px 2px;
            margin-left:0px;
            font-size: 30px;
            width: 98%;
            border-top: solid 1px #222;
          }
        }
      }
    }
    a.link__close-modal {
      display: block;
      width: 40px;
      height: 40px;
      position: absolute;
      right: 20px;
      top: 30px;
      &:before,
      &:after {
        content: "";
        position: absolute;
        z-index: 9999999;
        width: 40px;
        height: 6px;
        display: block;
        background: orangeRed;
        transform: rotate(44deg);
      }
      &:after {
        transform: rotate(-44deg);
      }
    }
  }
}
.modal__full-wrapper.sho {
  display: block;
}
@media only screen and (max-width: 499px) {
.modal__full-wrapper .modal .modal-inner .wrap__list-final 
  ul >li.li__total-line{
    margin-left:-12% !important;
  }
}
</style>