<?php 

if ( isset( $player_being_configured ) ): ?>
    <h1 id="names">
        <?php
            if ( isset( $players ) ) {
                echo $players[ $player_being_configured - 1 ][ "name" ];
            } ?>
    </h1>
	<h2 id="scores">
        <?php
            if ( isset( $players ) ) {
                echo $players[ $player_being_configured - 1 ][ "score" ];
				
            } ?>
    </h2>
  
   
    <input type="submit"  name="user_guess" id="user_guess"
        <?php if ( $player_turn != $player_being_configured ): ?>
            disabled
        <?php endif ?>
           value="ROLL" >
		   
<?php endif ?>
