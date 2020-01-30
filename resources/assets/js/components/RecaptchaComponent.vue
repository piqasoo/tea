<template>
  <vue-recaptcha sitekey="6LcMKtQUAAAAAKqFfPfcOJndlXWaw6XicIx_mYiP" :loadRecaptchaScript="true" theme="dark"></vue-recaptcha>
</template>
 
<script>
  import VueRecaptcha from 'vue-recaptcha';
  export default {
    components: { VueRecaptcha }
  };
</script>