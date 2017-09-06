<?php
    include_once('../config.php'); 
    include_once( INCLUDE_URL . 'head.php');
    include_once( INCLUDE_URL . 'sidebar.php');
?>
<!-- Body start -->
<div class="span10">
    <form>
        <section id="formElement" class="widget form-box section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/paragraph_justify.png'?>" class="widget-icon">
                <span>Form</span>
            </div>
            <div class="row-fluid">
                <div class="widget-content form">
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">Text input</label>
                                <div class="controls">
                                    <input id="input01" class="span10" type="text">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textarea">Textarea</label>
    
                                <div class="controls">
                                    <textarea id="textarea" class="span10" class="span8" rows="3"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="span6 form-freeSpace">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="select01">Select list</label>
                                <div class="controls">
                                    <select id="select01" class="span6">
                                        <option>something</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><p>checkboxes</p></label>
                                <div class="controls">
                                    <label class="checkbox inline">
                                        <input id="inlineCheckbox1" type="checkbox" value="option1">1
                                    </label>
                                    <label class="checkbox inline">
                                        <input id="inlineCheckbox2" type="checkbox" value="option2">
                                        2
                                    </label>
                                    <label class="checkbox inline">
                                        <input id="inlineCheckbox3" type="checkbox" value="option3">
                                        3
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls controls-normal">
                                    <img width="100%" height="auto" class="picture" src="<?=ADMIN_IMG_URL.'no-logo.png'?>" alt="Logo" />
                                </div>
                                <div class="upload">
                                    <p class="p-normal">Chọn Hình Ảnh ( Định Dạng Cho Phép PNG, JPG Và Gif )<p> 
                                    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
                                    <input type="file" name="image" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </section>
        <section id="texEditor" class="widget section">
            <div class="widget-title">
                <img src="<?=ADMIN_IMG_URL.'icons/pencil.png'?>" class="widget-icon">
                <span>Text editor</span>
            </div>
            <div class="row-fluid">
                <div class="utopia-widget-content-nopadding">
                    <div class="span12 text-editor">
                        <textarea id="textarea" class="ckeditor" class="span8" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </section>
        <div class="btn-submit">
            <input type="submit" id="growl-above" class="btn btn-success span5" value="Submit" />
        </div>
    </form>
</div>
<?php include_once( INCLUDE_URL . 'footer.php');?>