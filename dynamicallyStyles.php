<?php

/**
 *@class dynamicallyStyles needed to dynamically load popup windows for using them more than one time.
 */

class dynamicallyStyles
{
    public static function loadStyles(){

        echo '
            <div class="delete-modal">
              <div class="delete-modal-content">
                <div class="nav-top">
                    <p><b>Delete confirmation</b></p>
                    <button class="exit_delete" style="top: 0;">x</button>
                </div>
              <hr>
                <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
                  <div class="nav">
                    <div class="left" style="color: red;">
                      20
                    </div>
                    <div class="right">
                      <button class="agree_delete" name="button">Yes i am</button>
                      <button class="disagree_delete" name="button">No</button>
                    </div>
                  </div>
              </div>
            </div>';

        echo '
            <div class="update-modal">
              <div class="update-modal-content">
                <div class="nav-top">
                    <p><b>Update confirmation</b></p>
                    <button class="exit_update" style="top: 0;">x</button>
                </div>
              <hr>
                <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
                <textarea class="txt2" rows="2" cols="50" placeholder="enter new name"></textarea>
                  <div class="nav">
                    <div class="right">
                      <button class="agree_update" name="button">Yes i am</button>
                      <button class="disagree_update" name="button">No</button>
                    </div>
                  </div>
              </div>
            </div>
    ';

        echo '
            <div class="add-modal">
              <div class="add-modal-content">
                <div class="nav-top">
                    <p><b>Insert confirmation</b></p>
                    <button class="exit_insert" style="top: 0;">x</button>
                </div>
              <hr>
                <p>This is very dangerous, you shouldnt do it! Are you really really sure?</p><hr>
                <textarea class="txt1" rows="2" cols="50" placeholder="enter name"></textarea>
                  <div class="nav">
                    <div class="right">
                      <button class="agree_insert" name="button">Yes i am</button>
                      <button class="disagree_insert" name="button">No</button>
                    </div>
                  </div>
              </div>
            </div>
    ';
    }
}