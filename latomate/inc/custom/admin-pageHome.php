<?php
/**
 * Created by IntelliJ IDEA.
 * User: oscar
 * Date: 17.03.16
 * Time: 11:27
 */

function laTomate_admin_page(){
    ?>
    <div class="wrap">
        <h2>Configure Page d'accueil</h2>
        <p></p>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Slider</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
        <p></p>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Description</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
        <p></p>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Composants</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>

    </div>
    <?php
}

function custom_style() {
    echo '<style type="text/css">

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
    .panel-default {
        border-color: #ddd;
    }

    .panel > .panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd;
    }

    .panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.panel-body {
    padding: 15px;
}
    </style>';
}

