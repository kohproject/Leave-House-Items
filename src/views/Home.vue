<template>
  <div class="home">
    <header>
      <h1>{{ title }}</h1>
    </header>
    <hr />
    <p class="txt__instruction">{{ instruct }}</p>
    <LeaveTable
      @activateBtn="checkActiveRows"
      @displayModalPhoto2="shoModalPhoto"
      :itms="myItems"
      :totalPrice="sendTotal"
    />
    <hr />
    <div class="wrapper__bottom-button">
      <div class="wrap__total">
        <p>
        <b>Num. of Item(s):</b> <span :data-numitems="numTotal" class="sp__numitems"></span> | <b> Total: </b> <span :data-price="sendTotal" class="sp__price"></span>
        </p>
      </div>
      <label for="inpCode">Paste in the Code <br class="mo-only"/> before clicking on button</label>
      <input
        id="inpCode"
        type="text"
        :class="['inp', { err: errBool }]"
        @focus="errBool = false;leavePass=''"
        v-model="leavePass"
      />
      <button @click="sendit" :class="['btn', { active: btnBool }]">
        Send my wish list
      </button>
    </div>

    <ModalPhoto
      :photoSrc="mPhoto"
      :smallPhoto="photo"
      :modalBool="mBool"
      :priceTotal="sendTotal"
      :listBool="lBool"
      :sList="sendList"
      :sListNum="numTotal"
      @setLoading="loadingStatus = true"
      @closeModal="mBool = false"
    />
  </div>
  <loadingSpin :loadBool="loadingStatus"/>
</template>

<script>
// @ is an alias to /src
import LeaveTable from "@/components/LeaveTable.vue";
import ModalPhoto from "@/components/ModalPhoto.vue";
import loadingSpin from "@/components/loadingSpin.vue";
export default {
  name: "Home",
  data() {
    return {
      title: "Leave > It",
      instruct: "Click on the following rows to selected desired items",
      leavePass: "",
      loadingStatus:false,
      photo:'',
      mPhoto: "",
      mBool: false,
      lBool: false,
      errBool: false,
      btnBool: false,
      sendList: [],
      myItems: [
        {
          bool: false,
          item: "small table",
          desc: "contemporary small outdoor table - on top floor of porch",
          condition: "fair",
          mophoto: require("@/assets/items/item1.jpg"),
          photo: require("@/assets/items/small/item1.jpg"),
          free: true,
          price: "FREE"
        },
        {
          bool: false,
          item: "fire extinguisher",
          desc: "mounted small fire extinguisher mounted to kitchen wall -- never used",
          condition: "good",
          mophoto: require("@/assets/items/item2.jpg"),
          photo: require("@/assets/items/small/item2.jpg"),
          free: true,
          price: "FREE"
        },
        {
          bool: false,
          item: "framed print ancient map",
          desc: "thin frame  -- faux antique photo - in billards room",
          condition: "good",
             mophoto: require("@/assets/items/item3.jpg"),
             photo: require("@/assets/items/small/item3.jpg"),
          free: true,
          price: "FREE"
        },
        {
          bool: false,
          item: "heavy mirror",
          desc: "heavy framed mirror to reflect stair lights",
          condition: "good",
            mophoto: require("@/assets/items/item4.jpg"),
            photo: require("@/assets/items/small/item4.jpg"),
          free: true,
          price: "FREE"
        },
       
        {
          bool: false,
          item: "candle sconce",
          desc: "large + heavy wall candle sconce -- mounted on hallway wall",
          condition: "good",
             mophoto: require("@/assets/items/item7.jpg"),
             photo: require("@/assets/items/small/item7.jpg"),
          free: true,
          price: "FREE"
        },
        {
          bool: false,
          item: "brass candle holder",
          desc: "brass candle holder mounted in foyer -- internal spring keeps flame at constant height",
          condition: "good",
             mophoto: require("@/assets/items/item8.jpg"),
             photo: require("@/assets/items/small/item8.jpg"),
          free: true,
          price: "FREE"
        },
    
       
        {
          bool: false,
          item: "fake tree",
          desc: "artifical(plastic) 7' tree in wicker basket",
          condition: "good",
             mophoto: require("@/assets/items/item10.jpg"),
             photo: require("@/assets/items/small/item10.jpg"),
          free: true,
          price: "FREE"
        },
      
        {
          bool: false,
          item: "Large Map of World",
          desc: "Very large map of world with frame",
          condition: "fair/good",
             mophoto: require("@/assets/items/item12.jpg"),
             photo: require("@/assets/items/small/item12.jpg"),
          free: true,
          price: "FREE"
        },
        {
          bool: false,
          item: "wall mirror",
          desc: "thin wall mirror with plastic frame",
          condition: "good",
             mophoto: require("@/assets/items/item13.jpg"),
             photo: require("@/assets/items/small/item13.jpg"),
          free: true,
          price: "FREE"
        },
           {
          bool: false,
          item: "step cushion",
          desc: "brass step cushion with static top | used to step into clawfoot bathtub",
          condition: "fair/good",
             mophoto: require("@/assets/items/item14.jpg"),
             photo: require("@/assets/items/small/item14.jpg"),
          free: true,
           price: "FREE"
        },
           
         
           {
          bool: false,
          item: "2  still life prints",
          desc: "2 small wodd framed prints of food",
          condition: "good",
             mophoto: require("@/assets/items/item17.jpg"),
             photo: require("@/assets/items/small/item17.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "flower print",
          desc: "flower print with gold leaf frame",
          condition: "good",
             mophoto: require("@/assets/items/item18.jpg"),
             photo: require("@/assets/items/small/item18.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "coat rack",
          desc: "wall mounted coat rack -- last hook is loose",
          condition: "fair/good",
             mophoto: require("@/assets/items/item19.jpg"),
             photo: require("@/assets/items/small/item19.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "handle holder",
          desc: "heavy brass handle holder -- mounted on second floor hallway",
          condition: "good",
             mophoto: require("@/assets/items/item20.jpg"),
             photo: require("@/assets/items/small/item20.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "cd rack",
          desc: "black steel CD rack with steel shelf",
          condition: "good",
             mophoto: require("@/assets/items/item21.jpg"),
             photo: require("@/assets/items/small/item21.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "dart board with wood panel",
          desc: "wall mounted wood panel with dart board + 4 darts",
          condition: "good",
             mophoto: require("@/assets/items/item22.jpg"),
             photo: require("@/assets/items/small/item22.jpg"),
          free: true,
           price: "FREE"
        },
        
           {
          bool: false,
          item: "brass candle holder",
          desc: "heavy brass candle holder mounted on wall in billards room",
          condition: "good",
             mophoto: require("@/assets/items/item24.jpg"),
             photo: require("@/assets/items/small/item24.jpg"),
          free: true,
           price: "FREE"
        },
         
               {
          bool: false,
          item: "console table",
          desc: "heavy oak console table | in garden unit",
          condition: "good",
             mophoto: require("@/assets/items/item26.jpg"),
             photo: require("@/assets/items/small/item26.jpg"),
          free: true,
           price: "FREE"
        },
               {
          bool: false,
          item: "exercise bike",
          desc: "folding exercise bike -- like new!",
          condition: "good",
             mophoto: require("@/assets/items/item27.jpg"),
             photo: require("@/assets/items/small/item27.jpg"),
          free: true,
           price: "FREE"
        },
               {
          bool: false,
          item: "kitchen table",
          desc: "heavy white kitchen table for garden unit tenants",
          condition: "good",
             mophoto: require("@/assets/items/item28.jpg"),
             photo: require("@/assets/items/small/item28.jpg"),
          free: true,
           price: "FREE"
        },
               {
          bool: false,
          item: "side table",
           desc: "side bedroom table for garden unit tenants",
          condition: "good",
             mophoto: require("@/assets/items/item29.jpg"),
             photo: require("@/assets/items/small/item29.jpg"),
          free: true,
           price: "FREE"
        },
           {
          bool: false,
          item: "wood frame for electric fireplace insert",
          desc: "came with electric fireplace | used as bookshelf",
          condition: "good",
             mophoto: require("@/assets/items/item31.jpg"),
             photo: require("@/assets/items/small/item31.jpg"),
          free: true,
           price: "FREE"
        },
       {
          bool: false,
          item: "pair(2) lawn chairs",
          desc: "2 steel chairs on back porch-- no tears, but need fresh paint",
          condition: "fair/good",
             mophoto: require("@/assets/items/item33.jpg"),
             photo: require("@/assets/items/small/item33.jpg"),
          free: true,
           price: "FREE"
        },

       {
          bool: false,
          item: "wall hook shelf",
          desc: "wood shelf with picture inserts and 4 jacket hooks",
          condition: "good",
             mophoto: require("@/assets/items/item34.jpg"),
             photo: require("@/assets/items/small/item34.jpg"),
          free: true,
           price: "FREE"
        },
         {
          bool: false,
          item: "pair(2) candlestick lamps",
          desc: "2 large heavy brass lamps ",
          condition: "good",
             mophoto: require("@/assets/items/item32.jpg"),
             photo: require("@/assets/items/small/item32.jpg"),
          free: false,
           price: 20
        },
          {
          bool: false,
           item: "Renoir Print",
          desc: "Renoir print with goldleaf frame -- mounted in garden unit",
          condition: "good",
             mophoto: require("@/assets/items/item25.jpg"),
             photo: require("@/assets/items/small/item25.jpg"),
         free: false,
          price: 20
        },
          {
          bool: false,
          item: "Wall Mirror",
          desc: "wall mounted mirror with 2 small drawers",
          condition: "good",
             mophoto: require("@/assets/items/item11.jpg"),
             photo: require("@/assets/items/small/item11.jpg"),
        free: false,
          price: 20
        },
         {
          bool: false,
          item: "big wall clock",
          desc: "Plastic wall clock - hangs over fireplaces",
          condition: "good",
             mophoto: require("@/assets/items/item5.jpg"),
             photo: require("@/assets/items/small/item5.jpg"),
          free: false,
          price: 20
        },
        {
          bool: false,
          item: "child chair",
          desc: "antique oak child chair",
          condition: "good",
            mophoto: require("@/assets/items/item6.jpg"),
            photo: require("@/assets/items/small/item6.jpg"),
        free: false,
          price: 20
        },
          {
          bool: false,
          item: "art nouveau lamp",
          desc: "hanging brass lamp with milk glass globe",
          condition: "good",
             mophoto: require("@/assets/items/item16.jpg"),
             photo: require("@/assets/items/small/item16.jpg"),
        free: false,
          price: 20
        },
         {
          bool: false,
          item: "wall lamp",
          desc: "swivel arm wall lamp -- mounted on wall -- uses ac plug in closet",
          condition: "good",
             mophoto: require("@/assets/items/item9.jpg"),
             photo: require("@/assets/items/small/item9.jpg"),
         free: false,
          price: 20
        },
        {
          bool: false,
          item: "rocking horse",
          desc: "handmade pine wood rocking horse",
          condition: "good",
             mophoto: require("@/assets/items/item15.jpg"),
             photo: require("@/assets/items/small/item15.jpg"),
       free: false,
          price: 20
        },
           {
          bool: false,
          item: "Renoir Print",
          desc: "Renoir print with frame",
          condition: "good",
             mophoto: require("@/assets/items/item23.jpg"),
             photo: require("@/assets/items/small/item23.jpg"),
         free: false,
          price: 20
        },
          {
          bool: false,
          item: "teak bench",
          desc: "handmade teak bench from Indonesia",
          condition: "good",
             mophoto: require("@/assets/items/item30.jpg"),
             photo: require("@/assets/items/small/item30.jpg"),
          free: false,
          price: 250
        }
     
      ],
    };
  },
  computed: {

    numTotal: function(){
      return this.sendList.length
    },
    sendTotal: function () {
      if (this.sendList.length > 0) {
        let amt = 0;
        this.sendList.forEach((itm) => {
          if (itm.free === false) {
              amt += itm.price;
          }
        });
        return amt;
      }
      return 0;
    },
  },
  methods: {
    setSendList: function (bool) {
      this.sendList = [];
      if (bool) {
        this.sendList = this.myItems.filter((itm) => itm.bool === true);
      }
    },
    checkActiveRows: function () {
      this.btnBool = this.myItems.some((itm) => itm.bool === true);
      this.setSendList(this.btnBool);
    },
    shoModalPhoto: function (_num) {
   
      this.mPhoto = this.myItems[_num].mophoto;
      this.photo = this.myItems[_num].photo;
      this.mBool = true;
      this.lBool = false;
    },
    sendit: function () {

      if(this.sendList.length <1){
        alert('you must select one or more items to continue!');
        return;
      }
      
      if(this.leavePass.indexOf('scrip') !==-1 || this.leavePass.indexOf('<') !==-1){
        alert('no hackers!!!!');
          this.leavePass ='';
          return;
      }
      if (this.leavePass === "") {
        alert("please add passcode in textfield");
        this.errBool = true;
        return;
      }

      var $thisleave = this.leavePass.toLowerCase();
      
      if($thisleave === "stevetest"){
        
      if (this.btnBool) {
        this.lBool = this.btnBool;
        this.mBool = this.lBool;

        }
        return;
      }


      if ($thisleave != "x$312"){

        alert("The passcode is not correct");
        this.errBool = true;
        return;
      }

      if (this.btnBool) {
        this.lBool = this.btnBool;
        this.mBool = this.lBool;

      }
    },
  },
  components: {
    LeaveTable,
    ModalPhoto,
    loadingSpin
  },
};
</script>
<style type="text/css" lang="scss">
.home {
  margin-top: 100px;
  background: #999;
  
}
$btn: #990000;
span.sp__price, 
span.sp__numitems {
  background: #fff;
  color: #222;
  padding: 6px 14px;
  &:before {
    content: "$";
    display: inline-block;
  }

  &:after {
    content: attr(data-price);
    display: inline-block;
  }
}

span.sp__numitems{
    background:transparent;
    color:#fff;
    padding: 6px 1px;
  margin-right:1%;
  &:before {
      content: "";
  }
  &:after {
    content: attr(data-numitems);
  }
}


button.btn {
  min-width: 300px;
  font: normal 20px helvetica, sans-serif;
  width: 20%;
  clear: both;
  height: 60px;
  border: none;
  border-radius: 50px;
  opacity:.5;
  background: lighten($btn, 50%);
  color: #fff;
  &:hover {
    cursor: not-allowed;
  }
}
.wrapper__bottom-button {
  min-height: 70px;
  background: #2c2222;
  width: 100%;
  color: #fff;
  padding-top: 30px;
  padding-bottom: 10px;
  position: fixed;
  z-index: 99;
  bottom: 0px;
  left: 0px;
  top: auto;
  clear: both;
  .wrap__total {
    clear: both;
    text-align: right;
    padding-right: 20%;
  }
  label {
    font-size: 20px;
  }
}

button.btn.active {
  background: #cc0000;
  margin-top:15px;
  clear:both;
  opacity:1;
  color: #fff;
  &:hover {
    opacity: 0.9;
    cursor: pointer;
  }
}

input.inp {
  width: 320px;
  height: 40px;
  margin-right: 40px;
  margin-left: 20px;
  outline: none;
}

input.err {
  background: #f79d9d;
}

.mo-only{display: none}


@media only screen and (max-width: 499px) {
header h1{
  font-size:20px !important;
}
.wrapper__photo-block .wrap{
  padding:0px !important;
}
.wrapper__photo-block .wrap a{
font:bold 12px arial !important;
}
.mo-only{display: inline-block}

.wrapper__bottom-button{
    padding-top:20px;
  label{
    white-space:normal;
    display:block;
    font:bold 12px arial;
  }
  input.inp,
  button.btn{
    margin:10px auto 20px auto;
    min-width:220px !important;
    max-width:220px;
  }
   input.inp{
     margin-bottom:10px !important;
   }
}
  table.tab_leaveit{
    width:99%;
    font-size:14px !important;
    margin:auto auto 400px auto !important;
    thead tr th{
      padding:10px 2px !important;
    }

    thead tr th:nth-child(3),
    thead tr th:nth-child(4),
    tbody tr td:nth-child(3),
    tbody tr td:nth-child(4){
          display:none;
        }
  }

  
   div.mo__condition{
          clear:both;
          display:block;
          font:bold 12px arial;
          padding:2px;
          color:#ffffcc;
          background:#333;
        }
}
</style>