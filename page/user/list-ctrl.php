<?php


$headTemplate = new HeadTemplate('User list | Fly to the Limit', 'List of users');

//$status = Utils::getUrlParam('status');
//UserValidator::validateStatus($status);

$dao = new UserDao();
//$search = new UserSearchCriteria();
//$search->setStatus($status);

// data for template
//$title = Utils::capitalize($status) . ' USERS';
$sql = 'SELECT * FROM users WHERE status != "deleted"';
$users = $dao->find($sql);
