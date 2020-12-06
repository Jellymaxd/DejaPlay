<?php

class TacticDisplayer{

     public function displayTacticBlocks($seq_id, $tactics){



        foreach ($tactics as $tactic){
            echo 
            '<div class="tac-block">
                <div class="p-3">
                    <img src="images/tacticboard.jpg" alt="Image" class="img-fluid rounded-circle w-15 mb-4" width="200" height="auto">
                    <h2 class="h4 mb-4 text-white" style="text-align:center font-weight:bold">'.$tactic[0].'</h2>
                    <p class="text-white mb-5 lead" style="text-align:left">'.$tactic[1].'</p>
                </div>
            </div>';
        }
             //"col-md-6 text-center mb-5"



    }

}


?>