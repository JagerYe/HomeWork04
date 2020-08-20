<?php
session_start();
//登入驗證
if (isset($_POST["btnOK"])) {
  clearSessionDate();
  $userName = $_POST["txtUserName"];
  $userPassword = $_POST["txtPassword"];
  $_SESSION["txtUserName"] = $userName;
  $_SESSION["txtPassword"] = $userPassword;
  if ($userName == "" || $userPassword == "") {
    $_SESSION["loginPrompt"] = true;
    header("Location: login.php");
    exit();
  }

  header("Location: {$_SESSION['from']}");
  exit();
}
if (isset($_SESSION["loginPrompt"])) {
  echo ("<script>alert('帳號密碼請勿留白')</script>");
}
//登出動作
if (isset($_SESSION["txtUserName"]) && !isset($_SESSION["loginPrompt"])) {
  clearSessionDate();
  header("Location: {$_SESSION['from']}");
  exit();
}
//回首頁
if (isset($_POST["btnHome"])) {
  clearSessionDate();
  header("Location: index.php");
  exit();
}
function clearSessionDate()
{
  unset($_SESSION["loginPrompt"]);
  unset($_SESSION["txtUserName"]);
  unset($_SESSION["txtPassword"]);
}
?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Lab - Login</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="login.php">
    <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
          <font color="#FFFFFF">會員系統 - 登入</font>
        </td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">帳號</td>
        <td valign="baseline"><input type="text" name="txtUserName" id="txtUserName" value="<?= (isset($_SESSION["txtUserName"]) ? $_SESSION["txtUserName"] : "") ?>" /></td>
      </tr>
      <tr>
        <td width="80" align="center" valign="baseline">密碼</td>
        <td valign="baseline"><input type="password" name="txtPassword" id="txtPassword" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="btnOK" id="btnOK" value="登入" />
          <input type="reset" name="btnReset" id="btnReset" value="重設" />
          <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
        </td>
      </tr>
    </table>
  </form>
</body>

</html>