<?php
/**
 * Project: yiiim
 * File: add.php
 * User: 明心
 * Date: 14-8-4
 * Time: 下午5:11
 * Desc: 
 */
?>
<link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>
<link rel="stylesheet" href="/css/bootstrap-3.0.3.min.css" type="text/css"/>
<style>
    .uploadclass{
        width:80px;
    }
</style>
<form role="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">群名称</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="输入群名称" name="data[groupName]" value="<?php $str = !empty($data->groupName) ? $data->groupName : ''; echo $str; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">群头像</label>
        <input type="hidden" id="exampleInputFile" name="data[avatar]" value="<?php $str = !empty($data->avatar) ? $data->avatar : ''; echo $str; ?>">
        <input type="file" id="exampleInputFile" name="data[avatar]">
        <?php
        if(!empty($data->avatar)){
            ?>
            <img src="<?php echo $data->avatar;?>" class="uploadclass">
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">群描述</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="输入群描述" name="data[adesc]" value="<?php $str = !empty($data->adesc) ? $data->adesc : ''; echo $str; ?>">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">群组类型</label>
        <div class="radio">
            <label>
                <input type="radio" name="data[groupType]" value="1"  <?php if(isset($data->groupType) && $data->groupType == 1){echo 'checked';}elseif(empty($data->groupType)){echo 'checked';}?>>固定
            </label>&nbsp;
            <label>
                <input type="radio" name="data[groupType]" value="2" <?php if(isset($data->groupType) && $data->groupType == 2){echo 'checked';} ?>>临时
            </label>
        </div>
    </div>
    <div class="form-group">
<?php
?>
        <label for="exampleInputPassword1">群组人员</label>&nbsp;<a href="#" id="showtable">添加用户</a>
        <input type="hidden" id="adduserid" name="data[seluserid]" value="<?php if(isset($selUsers)){echo $selUsers;}?>">
            <table class="table" id="showtablediv">
                <tr>
                    <td>

                    </td>
                    <td>
                        昵称
                    </td>
                    <td>
                        姓名
                    </td>
                </tr>
                    <?php
                    foreach($users as $k => $v){
                    ?>
                <tr>
                    <td>
                        <input type="checkbox" value="<?php echo $v['userId'];?>" <?php if(isset($selUser[$k]->userId) && $selUser[$k]->userId == $v['userId']){echo 'checked';}?>>
                    </td>
                    <td>
                        <?php
                            echo $v['title'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $v['uname'];
                        ?>
                    </td>
                </tr>
                    <?php
                    }
                    ?>
            </table>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">状态</label>
        <div class="radio">
            <label>
                <input type="radio" name="data[status]" value="0"  <?php if(isset($data->status) && $data->status == 0){echo 'checked';}elseif(!isset($data->status)){echo 'checked';}?>>启用
            </label>&nbsp;
            <label>
                <input type="radio" name="data[status]" value="1" <?php if(isset($data->status) && $data->status == 1){echo 'checked';} ?>>禁用
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-default">
        <?php
            if(Yii::app()->controller->action->id == 'edit')
                echo '修改';
            else
                echo '添加';
        ?>
    </button>
</form>
<select id="test-build-filter-select" multiple="multiple">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
<script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
 $(document).ready(function() {                                                       
                var buildFilter = function(select, tr) {
                    select.multiselect({
                        enableFiltering: true
                    });
                    
                    if ($('.multiselect-search', tr).length !== 1) {
                        return 'No search input present.';
                    }
                    
                }($('#test-build-filter-select'), $('#test-build-filter-tr'));
            });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#showtablediv').hide();
        $('#showtable').click(function(){
            $('#showtablediv').toggle('fadeIn');
        })
        $('#showtablediv input').click(function(){
            var seluserid = $('#adduserid').val()+$(this).val() + ',';
            $('#adduserid').val(seluserid);
        })
    })
</script>
