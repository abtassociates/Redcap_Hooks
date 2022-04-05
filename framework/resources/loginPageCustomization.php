<?php
if ( defined("USERID") || defined("NOAUTH") ) //Skip if user is already logged in
    return;
?>

<style>

</style>

<script language="javascript">
    $( document ).ready(function() {
		let ldapPasswordReset = "https://yourOrgsPasswordResetPage.com"
		
        let isChrome = navigator.userAgent.search("Chrome") > -1 ? 'Chrome' : '';
        let isFirefox = navigator.userAgent.search("Firefox") > -1 ? 'Firefox': '';
        let version = 0;
        if ( isChrome || isFirefox ) {
            version = parseInt(navigator.userAgent.split((isChrome||isFirefox)+'/')[1].split('.')[0]);
		}
        
        if ( !isChrome && !isFirefox || version < 90 ) {
            $("#left_col p").after('<div class="alert alert-danger" role="alert">You appear to be using an unsupported browser or out-of-date browser! ORGANIZATION supports Google Chrome (90+), Mozilla FireFox (90+), and other browsers based on the two. Support is not available for Microsoft Internet Explorer or older versions of Microsfot Edge. You may still use Redcap, but various CTRI customizations may not behave as expected.</div>')
		}
        
        // Change the password reset link
        $("a:contains(Forgot your password?)").attr('href',ldapPasswordReset);
    });
</script>