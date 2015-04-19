<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<td width="8%"><input type="text" name="marks_10" id="marks_10" value="<?php if(isset($marks_10))echo $marks_10;?>" style="width:7%" maxlength="6" onkeypress="return isPercentage(event)"  onblur="alert('Hi');"/></td> 
</body>
<script type="text/javascript">
function fn(){alert('hi');}

  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && charCode!=45 &&(charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
</html>