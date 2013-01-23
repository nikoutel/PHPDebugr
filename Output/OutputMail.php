<?php

Class Output_OutputMail implements  Output {

    public function outputScalar($debugVar, $debugText){
       echo  'sending scalar mail';
        
    }
    public function outputComposite($debugVar, $debugText){
       echo ' sending composite mail';
    }

}

?>
