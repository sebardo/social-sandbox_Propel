<?php
if($follow->getIsActive() == '2'){
?>
<span style="background-color: #FF0000">Peticion en espera</span>
<?php
}elseif($follow->getIsActive() == '1'){
?>
<span style="background-color: #00FF00">Activa </span>
<?php
}
?>
