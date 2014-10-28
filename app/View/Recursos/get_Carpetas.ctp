<!-- file path View/Asistencias/get_recursos.ctp -->

<?php
    echo $this->Html->script("tree");
    echo $this->Html->css("tree");
?>

<div class="tree well">
    <ul>
        <li>
            <span><i class="icon-folder-open"></i> Parent</span> <a href="#">Carpeta 1 </a>
            <ul>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
            </ul>
        </li>
        <li>
            <span><i class="icon-folder-open"></i> Parent</span> <a href="#">Carpeta 1 </a>
            <ul>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="#">Archivo 1</a>
                </li>
            </ul>
        </li>
    </ul>
</div>