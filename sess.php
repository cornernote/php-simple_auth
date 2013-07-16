<?php

if (!$SESS_LIFE = get_cfg_var('session.gc_maxlifetime')) {
  $SESS_LIFE = 1440;
}

function _sess_open($save_path, $session_name) {
  return true;
}

function _sess_close() {
  return true;
}

function _sess_read($key) {
  $value_query = mysql_query("select value from sessions where sesskey = '" . mysql_real_escape_string($key) . "' and expiry > '" . time() . "'");
  $value = mysql_fetch_assoc($value_query);
  if (isset($value['value'])) {
    return $value['value'];
  }
  return false;
}

function _sess_write($key, $val) {
  global $SESS_LIFE;
  $expiry = time() + $SESS_LIFE;
  $value = $val;
  $check_query = mysql_query("select count(*) as total from sessions where sesskey = '" . mysql_real_escape_string($key) . "'");
  $check = mysql_fetch_assoc($check_query);
  if ($check['total'] > 0) {
    return mysql_query("update sessions set expiry = '" . mysql_real_escape_string($expiry) . "', value = '" . mysql_real_escape_string($value) . "' where sesskey = '" . mysql_real_escape_string($key) . "'");
  } else {
    return mysql_query("insert into sessions values ('" . mysql_real_escape_string($key) . "', '" . mysql_real_escape_string($expiry) . "', '" . mysql_real_escape_string($value) . "')");
  }
}

function _sess_destroy($key) {
  return tep_db_query("delete from sessions where sesskey = '" . mysql_real_escape_string($key) . "'");
}

function _sess_gc($maxlifetime) {
  tep_db_query("delete from sessions where expiry < '" . time() . "'");
  return true;
}

session_set_save_handler('_sess_open', '_sess_close', '_sess_read', '_sess_write', '_sess_destroy', '_sess_gc');
?>
