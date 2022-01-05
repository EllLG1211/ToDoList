<?php
echo '<button type="submit" name="choice" value='.$listToDisplay->getID().'>
<h3>'.$listToDisplay->getName().'</h3>
        <u>Creator :</u> ';
if($listToDisplay->getCreator()->isVisitor()) echo "---";
else echo $listToDisplay->getCreator()->getName();
echo '<br/><u>Visibility :</u> '.visibility::toString($listToDisplay->getVisibility()).'</button>';
