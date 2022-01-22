<template>
  <div>
    <Postcode @postcode="loadAddresses($event)" />

    <ul v-show="addresses.length > 0 && show" class="list-group">
      <li v-for="address in addresses" class="list-group-item" @click="select(address)">{{ address.line_1 }}</li>
    </ul>
<!--    <div v-show="selectedAddress">
      {{selectedAddress.line_1}}
      {{selectedAddress.line_2}}
      {{selectedAddress.line_3}}
    </div>-->
  </div>
</template>

<script>
import Postcode from './Postcode'

export default {
  name: 'AddressLookup',
  data: function () {
    return {
      addresses: [],
      show: false,
      /*selectedAddress:false,*/
    }
  },
  methods: {
    loadAddresses (postcode) {
      fetch('https://addresses.iamproperty.com/postcodes/' + postcode + '/addresses')
      .then(r => r.json())
      .then(j => {
          console.log('jjjj',j.result);
        this.show = true
        this.addresses = j.result
      })
    },
    select(v) {
      this.show = false
      this.$emit('select', v)
       /* this.selectedAddress=v;*/
    }
  },
  components: {
    Postcode
  }
}
</script>

<style scoped>

</style>
