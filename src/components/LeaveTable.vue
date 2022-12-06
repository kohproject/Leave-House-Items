<template>
  <table class="tab_leaveit">
    <thead>
      <tr>
        <th width="10%">Action</th>
        <th width="15%">Item</th>
        <th width="44.9%">Description</th>
        <th width="5%">Condition</th>
        <th width="15">Photos</th>
        <th width="10%">Price</th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="(itm, index) in itms"
        :id="'row__' + index"
        :class="{ 'row-selected': itm.bool }"
        :key="itm.item"
        @click="selectItem($event, itm)"
      >
        <td>
          <p>Want it?</p>
          <div>
            <input type="checkbox" class="chx__toggle" :checked="itm.bool" />
          </div>
        </td>
        <td>{{ itm.item }}<div class="mo__condition">{{itm.condition}}</div></td>
        <td>{{ itm.desc }}</td>
        <td>{{ itm.condition }}</td>
        <td style="padding-left: 0px">
          <photoBlock @click="emitDisplayPhoto(index)" :photosrc="itm.photo" />
        </td>
        <td :class="{ dollar: !itm.free }">
          <span>{{ itm.price }}&nbsp;</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import photoBlock from "./photoBlock.vue";
export default {
  name: "leaveTable",
  props: ["itms"],

  methods: {
    emitDisplayPhoto: function (num) {
      this.$emit("displayModalPhoto2", num);
    },

    selectItem: function (evt, itm) {
      if (evt.target.nodeName === "TD" || evt.target.nodeName === "INPUT") {
        itm.bool = !itm.bool;
        this.$emit("activateBtn");
      }
    },
  },
  components: {
    photoBlock,
  },
};
</script>
<style type="text/css" lang="scss">
$green: green;
$off: #cc0000;

.chx__toggle {
  outline: none;
  appearance: none;
  width: 66px;
  height: 30px;
  border-radius: 20px;
  position: relative;
  border: solid 4px $off;
  background: $off;
  &:after {
    content: "NO";
    padding-left: 30px;

    font: bold 9pt/170% arial;
    color: #fff;
  }
  &:before {
    content: "";
    display: block;
    width: 16px;
    height: 16px;
    border-radius: 16px;
    background: lighten($off, 55%);
    position: absolute;
    top: 3px;
    left: 4px;
    transition: left 0.15s ease;
  }
}

.chx__toggle:checked {
  border: solid 4px lighten($green, 5%);
  background: lighten($green, 10%);
  &:after {
    content: "YES";
    padding-left: 11px;
  }
  &:before {
    left: 39px;
    background: lighten($green, 65%);
  }
}
$rowSelected: #3c5b4b;
 div.mo__condition{
          clear:both;
          display:none;
        }
.tab_leaveit {
  border: solid 1px #333;
  margin: auto auto 190px auto;
  width: 90%;


  tfoot {
    background: #666;

    tr > td {
      border-top: solid 2px #000;
      padding: 20px;
      color: #fff;
    }
  }
  thead {
    background: #333;
    tr {
      th {
        text-align: center;
        padding: 20px;
        color: #fff;
      }
      th:nth-child(2) {
        text-align: left;
      }
      th:nth-child(3) {
        text-align: left;
      }
    }
  }

  tbody {
    background: #fff;
    font-size: 18px;
    overflow-x:auto;
    tr:nth-child(odd) {
      background: #eee;
    }
    tr.row-selected:hover,
    tr.row-selected {
      color: #fff;
      background: $rowSelected;
      td {
        font-weight: bold;
       
      }
      td.dollar {
        background: $rowSelected;
      }
    }
    tr {
      &:hover {
        background: #ccc;
        cursor: pointer;
        transition: background 0.1s ease-in-out;
      }
      td {
        text-align: left;
        padding-left: 1%;

        p {
          margin: 4px;
        }
      }
      td.dollar {
        background: #fffccc;
        span {
          display: inline-block;
          width: 100%;
          height: 40px;
          font-weight: bold;
          transform: scale(1.1);
          &:before {
            content: "$";
          }
        }
      }
    }
  }
}

</style>