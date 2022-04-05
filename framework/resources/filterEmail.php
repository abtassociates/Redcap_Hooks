<?php

// Filter email to only send to whitlisted addresses. Junk all other outbound email.
// Update whitelist below

function filterEmail($to, $from, $subject, $message, $cc = null, $bcc = null, $fromName = null, $attachments = null) {
	
	$whiteList = ["foo@fakedomain.com"];
	$to = array_map("trim", explode(";",$to));
	$filter = array_intersect_key($to, $whiteList);

	// No valid email to send to
	if ( count($filter) == 0 ) {
		return false;
	}
	
	// If everyone in the original "to" is in the whitelist
	// send the email as normal
	if ( count($to) == count($filter) ) {
		return true;
	}
	
	// Send email to only those in the whitelist
	// cancel the current send attempt
	$to = implode(";", $filter);
	redcap_email($to, $from, $subject, $message, $cc, $bcc, $fromName, $attachments);
    return false;
}