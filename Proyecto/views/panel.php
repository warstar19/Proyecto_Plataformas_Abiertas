<?php
require_once('head.php');

?>
<ul class="nav justify-content-end">
<?php
foreach ($accesos as $acceso) {
?>
<li class="nav-item">
    <a class="nav-link active" href="<?=$acceso[2]?>">
        <?=$acceso[1]?>
    </a>
</li>
<?php
}
?>
</ul>

<?php
require_once('footer.php');

?>