<?php
function inputForm($field,$label,$value = ''){
?>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" required="required" autocomplete="off">
                </div>
              </div>                   
<?php 
} 
function inputFormReadOnly($field,$label,$value = ''){
?>
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" readonly="readonly" required="required">
                </div>
              </div> 
<?php 
} 
function inputFormHidden($field,$label,$value = ''){
?>
                  <input type="hidden" class="form-control" id="<?=$field?>" name="<?=$field?>" placeholder="<?=$label?>" value="<?=$value?>" readonly="readonly" required="required">       
<?php            
} 
function inputFormSelect($field,$label,$table,$value = ''){
?> 
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-6">
                  <select class="form-control" name="<?=$field?>">
                  	
                  <?php 
				  if($value !== ''){ echo '<option value="'.$value.'">'.$value.'</option>'; };
				  $qryF = mysql_query("select * from $table"); 
				  while($rowF = mysql_fetch_array($qryF)){
				  ?> 
                    <option value="<?=$rowF[1]?>"><?=$rowF[1]?></option>
                  <?php
				  }
				  ?>  
                  </select>									
                </div>
              </div> 
<?php
}
function inputFormDateTime($field,$label,$value = ''){
?> 
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-7 col-xs-7" data-date-format="yyyy-mm-dd - HH:ii" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" id="<?=$field?>" name="<?=$field?>" readonly>
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>									
                </div>
              </div>              
<?php
}
function inputFormDate($field,$label,$value = ''){
?> 
              <div class="form-group">
                <label class="col-sm-3 control-label"><?=$label?></label>
                <div class="col-sm-6">
                  <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" id="<?=$field?>" name="<?=$field?>" readonly>
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>									
                </div>
              </div>              
<?php
}
function inputFormSelectBiasa($field,$label,$table,$value = ''){
?> 
                
                  <select name="<?=$field?>" required>
                  	<option value="">-- Pilih <?=$label?> --</option>
                  <?php 
				  
				  $qryF = mysql_query("select * from $table"); 
				  while($rowF = mysql_fetch_array($qryF)){ $select = '';
				  if($value == "$rowF[1]"){$select = 'selected="selected"';};
				  ?> 
                    <option <?=$select?> value="<?=$rowF[1]?>"><?=$rowF[1]?></option>
                  <?php
				  }
				  ?>  
                  </select>	
<?php
}
function inputFormSelectMultiple($field,$label,$table,$value = ''){
?> 
                
                  <select multiple="multiple" name="<?=$field?>">
                  	
                  <?php 
				  if($value !== ''){ echo '<option value="'.$value.'">'.$value.'</option>'; };
				  $qryF = mysql_query("select * from $table"); 
				  while($rowF = mysql_fetch_array($qryF)){
				  ?> 
                    <option value="<?=$rowF[1]?>"><?=$rowF[1]?></option>
                  <?php
				  }
				  ?>  
                  </select>	
<?php
}
function inputFormButton($field,$label,$value = ''){
?> 
              <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <a href="?page=data" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary" id="<?=$field?>" name="<?=$field?>" value="<?=$value?>"><?=$label?></button>
              </div>
              </div>
<?php
}
function inputFormLevelUser($level=''){
?> 
              <div class="form-group">
                <label class="col-sm-3 control-label">Level</label>
                <div class="col-sm-6">
                  <select class="form-control" name="level">
                  	<?php if($level !== ''){ echo '<option selected="selected" value="'.$level.'">'.$level.'</option>'; };?>
                    <option value="operator">operator</option> 
                    <option value="superVisor">superVisor</option> 
                  </select>									
                </div>
              </div> 
<?php
}
?>  




         