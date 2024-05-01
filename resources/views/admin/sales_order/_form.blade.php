<style>
    input[type=text] {
        width: 84%;
    }

    .cartList:hover {
        background: #123456;
        color: #ffffff;
    }

    .tbody-input:focus {
        background: #123456;
        color: #ffffff;
    }

    .tbody-input {
        text-align: center;
    }
</style>
<?php
$this->widget('application.components.BreadCrumb', array(
    'crumbs' => array(
        array('name' => 'CRM', 'url' => array('')),
        array('name' => 'Sales Order', 'url' => array('')),
        array('name' => 'Sales Order Create',),
    ),
    //    'delimiter' => ' &rarr; ',
));
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'sell-items-form',
    'action' => $this->createUrl('sellItems/create'),
    'clientOptions' => array('validateOnSubmit' => FALSE),
));
?>
<?php
$discountTypeP = DiscountType::model()->findByPk(DiscountType::PERCENTAGE);
if ($discountTypeP->is_active == DiscountType::ACTIVE)
    $isDiscPercntg = 1;
else
    $isDiscPercntg = 0;

$sellPriceEditableValidationInfo = CustomerAbValidation::model()->findByPk(2);
if ($sellPriceEditableValidationInfo->is_active == CustomerAbValidation::INACTIVE) {
    $isOnVal = 0;
} else {
    $isOnVal = 1;
}
$abValidationInfo = CustomerAbValidation::model()->findByPk(1);
if ($abValidationInfo->is_active == CustomerAbValidation::INACTIVE) {
    $isOnValCustomerAb = 0;
} else {
    $isOnValCustomerAb = 1;
}
//$thisSellNoFormat = VoucherNoFormate::model()->numberFormatOfThis(VoucherNoFormate::SELL_ORDER);
//$thisSellNo = VoucherNoFormate::model()->maxValOfThis('SellItems', 'si_no', 'maxSINo');
?>
<?php echo $form->hiddenField($model, 'sales_no'); ?>
<div class="formDiv">
    <fieldset style="width: 800px;">
        <legend align="center" style="font-weight:bold; font-size:16px; color:#30F; text-align:center">SALES ORDER FORM
        </legend>
        <div style="float: left;">
            <fieldset style="float: left; width: 400px; height: 295px;" class="someStyle">
                <legend>Order Information</legend>
                <table style="width: 100%">
                    <tr>
                        <td><?php echo $form->labelEx($model, 'date_of_sell'); ?> <span style="color:red">*</span></td>
                        <td>:
                            <?php
                            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                            $dateTimePickerConfig1 = array(
                                'model' => $model, //Model object
                                'attribute' => 'order_dates', //attribute name
                                'mode' => 'date', //use "time","date" or "datetime" (default)
                                'language' => 'en-AU',
                                'options' => array(
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'dateFormat' => 'yy-mm-dd',
                                    'width' => '110',
                                ),
                                'htmlOptions' => array(
                                    'value' => date("Y-m-d"),
                                )
                            );
                            $this->widget('CJuiDateTimePicker', $dateTimePickerConfig1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'manual_order_no'); ?></td>
                        <td>: <?php echo $form->textField($model, 'manual_order_no'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'company_id'); ?> <span style="color:red">*</span></td>
                        <td>
                            : <?php
                                $user_data = Users::model()->findByPk(Yii::app()->user->id);


                                //======= as command by hafiz vai date 21-09-2023 (by deafult farhad traders thakbe)=====
                                // if ($user_data->company_id > 0) {
                                //     echo $form->dropDownList($model, 'company_id', CHtml::listData(YourCompany::model()->findAll(array('condition' => "is_active = 1 AND id = $user_data->company_id")), 'id', 'company_name'));
                                // } else {
                                //     echo $form->dropDownList($model, 'company_id', CHtml::listData(YourCompany::model()->findAll(array('condition' => 'is_active = 1')), 'id', 'company_name'), array('prompt' => 'select'));
                                // }


                                echo $form->dropDownList($model, 'company_id', CHtml::listData(YourCompany::model()->findAll(array('condition' => "is_active = 1")), 'id', 'company_name'), array("options" => array(10 => array("selected" => true))));
                                ?>
                                <!-- <input type="text" id="company_id" style="display: none;background-color: rgb(215, 215, 215);" readonly>  -->
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <td><?php echo $form->labelEx($model, 'cash_due'); ?></td>
                        <td><input type="text" name="SellItems[cash_due]" id="SellItems_cash_due" readonly value="82"></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'expected_delivery_date'); ?></td>
                        <td>:
                            <?php
                            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                            $dateTimePickerConfig1 = array(
                                'model' => $model, //Model object
                                'attribute' => 'expected_delivery_date', //attribute name
                                'mode' => 'date', //use "time","date" or "datetime" (default)
                                'language' => 'en-AU',
                                'options' => array(
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'dateFormat' => 'yy-mm-dd',
                                    'width' => '100',
                                )
                            );
                            $this->widget('CJuiDateTimePicker', $dateTimePickerConfig1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'available_balance'); ?></td>
                        <td>: <?php echo $form->textField($model, 'available_balance'); ?></td>
                    </tr>
                    <!--<tr>
                        <td></td>
                        <td>
                           <small> AB Validation: <?php /*                            if ($isOnValCustomerAb == 0)
                              echo "<font style='color: red; font-weight: bold;'>OFF</font>";
                              else
                              echo "<font style='color: green; font-weight: bold;'>ON</font>";
                             */ ?>
                           </small>
                        </td>
                    </tr>-->
                    <tr>
                        <td><?php echo $form->labelEx($model, 'memo_no'); ?></td>
                        <td>: <?php echo $form->textField($model, 'memo_no'); ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'manual_po_no'); ?></td>
                        <td>: <?php echo $form->textField($model, 'manual_po_no'); ?> </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'booking_address'); ?></td>
                        <td>: <?php echo $form->textField($model, 'booking_address'); ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'receiver_person_name'); ?></td>
                        <td>: <?php echo $form->textField($model, 'receiver_person_name'); ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'receiver_contact_number'); ?></td>
                        <td>: <?php echo $form->textField($model, 'receiver_contact_number'); ?> </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset style="float: left; width: 400px; height: 295px;" class="someStyle">
                <legend>Distributor Information</legend>
                <table style="width: 100%">
                    <tr>
                        <td><?php echo $form->labelEx($model, 'distributor_id'); ?> <span style="color:red">*</span> </td>
                        <td>:
                            <input type="text" id="distributor_id_text" />
                            <?php echo $form->hiddenField($model, 'distributor_id'); ?>
                            <input type="hidden" id="distributor_credit_limit" name="distributor_credit_limit" />
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'code_no'); ?></td>
                        <td>: <?php echo $form->textField($model, 'code_no', array('readonly' => 'readonly')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'territory_id'); ?></td>
                        <td>: <input type="text" id="territory_id_text" readonly /> <?php echo $form->hiddenField($model, 'territory_id'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'area_id'); ?></td>
                        <td>: <input type="text" id="areaName" readonly /> <?php echo $form->hiddenField($model, 'area_id'); ?></td>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'region_id'); ?></td>
                        <td>: <input type="text" id="regionName" readonly /> <?php echo $form->hiddenField($model, 'region_id'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'district_id'); ?></td>
                        <td>: <input type="text" id="depoName" readonly /> <?php echo $form->hiddenField($model, 'district_id'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'division_id'); ?></td>
                        <td>: <input type="text" id="divisionName" readonly /> <?php echo $form->hiddenField($model, 'division_id'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'project_name'); ?></td>
                        <td>: <?php echo $form->textField($model, 'project_name'); ?> </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'transport'); ?></td>
                        <td>: <?php echo $form->textField($model, 'transport'); ?> </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'offer_or_regular'); ?></td>
                        <td>:
                            <select name="SellItems[offer_or_regular]" id="SellItems_offer_or_regular" style="display: <?= ($model->offer_or_regular == 1) ? 'none' : '' ?>;">
                                <option value="">Select</option>
                                <option value="1" <?= ($model->offer_or_regular == 1) ? 'selected = "selected"' : '' ?>> Offer </option>
                                <option value="2" selected>Regular</option>
                                <option value="3" <?= ($model->offer_or_regular == 3) ? 'selected = "selected"' : '' ?>>Sample</option>
                                <option value="4" <?= ($model->offer_or_regular == 4) ? 'selected = "selected"' : '' ?>>Gift</option>
                            </select>
                            <input type="text" id="offer_or_regular" value="Offer" style="display: <?= ($model->offer_or_regular == '' || $model->offer_or_regular == 2 || $model->offer_or_regular == 3) ? 'none' : '' ?>;background-color: rgb(215, 215, 215);text-align:left;" readonly>
                        </td>
                    </tr>
                    <?php
                    $regularDiscount = 0;
                    $regularOfferId = 0;
                    $regularOfferCriteria = new CDbCriteria();
                    $regularOfferCriteria->addColumnCondition(['status' => 1, 'offer_type' => 2]);
                    if ($model->category_id == ProdItems::ACCESSORIES || $model->category_id == ProdItems::METAL) {
                        $regularOfferCriteria->addInCondition('prod_item_id', [ProdItems::ACCESSORIES, ProdItems::METAL]);
                    } else {
                        $regularOfferCriteria->addColumnCondition(['prod_item_id' => $model->category_id]);
                    }
                    // $regularOfferCriteria->group = "discount_name";
                    $regularOfferCriteria->order = 'id DESC';
                    $regularOfferCriteria->limit = 1;
                    $dataRegular = DiscountSetup::model()->findByAttributes([], $regularOfferCriteria);
                    if ($dataRegular) {
                        $regularOfferId = $dataRegular->id;
                        $regularDiscount = $dataRegular->discount_percentage;
                    }
                    $showHideOffer = "";
                    if ($model->offer_or_regular != 1) {
                        $showHideOffer = "display: none;";
                    }
                    ?>
                    <tr style="<?= $showHideOffer ?>" class="discountOffer">
                        <td><?php echo $form->labelEx($model, 'offer_id'); ?></td>
                        <td>: <select name="offer_id" id="SellItems_offer_id">
                                <option value="0|0">Select</option>
                                <?php
                                $oldValueString = "0|0";
                                $oldValue = 0;
                                $oldDiscountId = "";
                                $criteria = new CDbCriteria();
                                $criteria->addColumnCondition(['status' => 1, 'offer_type' => 1]);
                                // $criteria->group = "discount_name";
                                $criteria->order = 'id DESC';
                                $dataOffer = DiscountSetup::model()->findAll($criteria);
                                if ($dataOffer) {
                                    foreach ($dataOffer as $offer) {
                                        if ($model->discount == $offer->discount_percentage) {
                                            $selected = "selected = 'selected'";
                                            $oldValueString = $offer->id . "|" . $offer->discount_percentage;
                                            $oldDiscountId = $offer->id;
                                            $oldValue = $model->discount;
                                        } else {
                                            $selected = "";
                                        }
                                ?>
                                        <option value="<?= $offer->id . "|" . $offer->discount_percentage ?>" <?= $selected ?>>
                                            <?= "$offer->discount_name ($offer->discount_percentage%)" ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <script>
                                var regularOfferId = "<?= $regularOfferId ?>";
                                var regularDiscount = "<?= $regularDiscount ?>";
                                var oldValue = "<?= $oldValue ?>";
                                var oldValueString = "<?= $oldValueString ?>";
                                var oldDiscountId = "<?= $oldDiscountId ?>";
                                $('#SellItems_offer_or_regular').on('change', function() {
                                    if (this.value == 1) { // if offer
                                        $("#SellItems_offer_or_regular").hide();
                                        $("#offer_or_regular").val("Offer");
                                        $("#offer_or_regular").show();
                                        console.log("OFFER: " + oldValueString + ", VALUE: " + oldValue);
                                        $('#SellItems_offer_id').val(oldValueString);
                                        $('#offer_id').val(oldDiscountId);
                                        $('#offer_discount_value').val(oldDiscountId);
                                        $(".discountOffer").show();
                                        $(".temp_disc_percentage").val(oldValue);
                                        $(".temp_disc_percentage_text").html(oldValue);

                                        if ($("#SellItemsDetails_model_id").val() > 0) {
                                            $("#SellItemsDetails_discount_percentage").val(oldValue);
                                        }
                                    } else if (this.value == 2) { // if regular
                                        $(".discountOffer").hide();
                                        $('#SellItems_offer_id').val(regularOfferId);
                                        $('#offer_id').val(regularOfferId);
                                        $(".temp_disc_percentage").val(regularDiscount);
                                        $(".temp_disc_percentage_text").html(regularDiscount);
                                        $(".temp_sell_qty").keyup();
                                        $("#SellItemsDetails_discount_percentage").val(regularDiscount);
                                        $("#offer_discount_value").val(regularDiscount);
                                    } else {
                                        $(".discountOffer").hide();
                                        $('#SellItems_offer_id').val("0|0");
                                        $('#offer_id').val("");
                                        $(".temp_disc_percentage").val(0);
                                        $(".temp_disc_percentage_text").html(0);
                                        $(".temp_sell_qty").keyup();
                                        $("#SellItemsDetails_discount_percentage").val("");
                                        $("#offer_discount_value").val("");
                                    }
                                });
                                $('#SellItems_offer_id').on('change', function() {
                                    var discountOffer = this.value;
                                    var id = discountOffer.slice(0, discountOffer.lastIndexOf('|') + 0);
                                    var offerValue = discountOffer.slice(discountOffer.lastIndexOf('|') + 1);
                                    if (id != 0) {
                                        $(".temp_disc_percentage").val(offerValue);
                                        $(".temp_disc_percentage_text").html(offerValue);
                                        $('#offer_discount_value').val(offerValue);

                                        $(".temp_sell_qty").keyup();
                                        $('#offer_id').val(id);

                                        if ($("#SellItemsDetails_model_id").val() > 0) {
                                            $("#SellItemsDetails_discount_percentage").val(offerValue);
                                        }
                                    } else {
                                        $(".temp_disc_percentage").val(oldValue);
                                        $(".temp_disc_percentage_text").html(oldValue);
                                        $('#offer_discount_value').val(oldValue);
                                        this.value = oldValueString;
                                        if ($("#SellItemsDetails_model_id").val() > 0) {
                                            $("#SellItemsDetails_discount_percentage").val(oldValue);
                                        }
                                        $(".temp_sell_qty").keyup();
                                        $('#offer_id').val(id);
                                    }
                                });
                            </script>
                            <input type="hidden" name="SellItems[offer_id]" id="offer_id" value="<?= ($oldDiscountId > 0) ? $oldDiscountId : $regularOfferId ?>">
                            <input type="hidden" name="SellItems[offer_value]" id="offer_discount_value" value="<?= $oldValue ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'price_set_up'); ?></td>
                        <td>: <?php echo $form->dropDownList($model, 'price_set_up', array('1' => 'New', '2' => 'Old')); ?></td>
                    </tr>
                </table>
            </fieldset>
            <div style="float: left; width: 80px;">
                <div style="float: left;">
                    <fieldset style="float: left; width: 203px; height: 295px" class="someStyle">
                        <legend>Calculation</legend>
                        <?php echo $form->labelEx($model, 'grand_total'); ?>
                        <?php echo $form->textField($model, 'grand_total', array('readonly' => 'readonly', 'style' => 'width: 98%; background: -moz-linear-gradient(center top , #3F653F, #1A1A1A) repeat scroll 0 0 rgba(0, 0, 0, 0); color: #008b8b; font-weight: bold; text-align: center;')); ?>
                        <input type="checkbox" id="overallDiscountEnable" name="SellItems[overallDiscountEnable]" onclick="overallDiscountEnableFunction()" value="0">
                        <?php echo $form->labelEx($model, 'overallDiscount'); ?>
                        <?php echo $form->numberField($model, 'overallDiscount', array('style' => 'width: 98%; font-weight: bold; text-align: center;', 'onkeyup' => 'overallDiscountFunction()', 'readonly' => true)); ?>
                        <?php echo $form->labelEx($model, 'overallDiscountAmount'); ?>
                        <?php echo $form->numberField($model, 'overallDiscountAmount', array('style' => 'width: 98%; font-weight: bold; text-align: center;    background-color: rgb(221 221 221);margin: 5px 0;', 'readonly' => true)); ?>
                        <?php echo $form->labelEx($model, 'grand_total_with_discount'); ?>
                        <?php echo $form->textField($model, 'grand_total_with_discount', array('readonly' => 'readonly', 'style' => 'width: 98%; background: -moz-linear-gradient(center top , #3F653F, #1A1A1A) repeat scroll 0 0 rgba(0, 0, 0, 0); color: #008b8b; font-weight: bold; text-align: center;')); ?>
                        <label>Remarks</label>
                        <?php echo $form->textArea($model, 'note', array('style' => 'width: 98%;height: 35%;;text-align: left;')); ?>
                    </fieldset>
                </div>
            </div>
        </div>
        <div style="float: left;">
            <fieldset class="someStyle" style="float: left; width: 1051px;">
                <legend>Product Informations</legend>
                <table class="prodAddedTab">
                    <tr>
                        <!-- <td><?php echo $form->labelEx($detailModel, 'type'); ?></td>
                        <td><label>Category</label></td>
                        <td><label>Sub-Category</label></td>
                        <td><?php echo $form->labelEx($detailModel, 'model_id'); ?></td>
                        <td><?php echo $form->labelEx($detailModel, 'code'); ?></td>
                        <td><?php echo $form->labelEx($detailModel, 'discount_percentage'); ?></td>
                        <td><?php echo $form->labelEx($detailModel, 'sell_qty'); ?></td>
                        <td><label>Action</label></td> -->
                        <td> Product Name </td>
                        <td> Product Head </td>
                        <td> Product Code </td>
                        <td> Discount Percentage (%) </td>
                        <td> Order Qty </td>
                        <td> Action </td>

                    </tr>
                    <tr>
                        <td style="display:none;">
                            <?php
                            echo $form->dropDownList($detailModel, 'type', Lookup::items('product_type'), array('prompt' => 'select'));;
                            ?>
                        </td>
                        <td style="display:none;">
                            <?php
                            echo $form->dropDownList(
                                $detailModel,
                                'item_id',
                                ProdItems::model()->catList(),
                                array(
                                    'prompt' => 'Select',
                                )
                            );
                            ?>
                        </td>
                        <td style="display:none;">
                            <?php
                            echo $form->dropDownList(
                                $detailModel,
                                'brand_id',
                                ProdBrands::model()->subCatListFromItem(),
                                array(
                                    'prompt' => 'Select',
                                )
                            );
                            ?>
                        </td>
                        <?php echo $form->hiddenField($detailModel, 'model_id'); ?>
                        <td> <?php echo $form->textField($detailModel, 'product_name', array('readonly' => 'readonly')); ?> </td>
                        <td> <input type="text" readonly id="headName"> </td>
                        <td> <?php echo $form->textField($detailModel, 'code', array('maxlength' => 255, 'onkeypress' => "return AddKeyPress(event);")); ?> </td>
                        <td>
                            <!--<input type="text" id="model_id_text" readonly/>-->
                            <?php echo $form->textField($detailModel, 'discount_percentage', array('readonly' => 'readonly')); ?>
                            <?php echo $form->hiddenField($detailModel, 'sell_price'); ?>
                            <?php echo $form->hiddenField($detailModel, 'discount_amount'); ?>
                            <?php echo $form->hiddenField($detailModel, 'line_total'); ?>
                            <?php echo $form->hiddenField($detailModel, 'line_total_with_discount'); ?>
                        </td>
                        <td><?php echo $form->textField($detailModel, 'sell_qty', array('maxlength' => 255, 'value' => '', 'placeholder' => '', 'style' => 'text-align: center;', 'onkeypress' => "return AddKeyPress(event);")); ?></td>
                        <td>
                            <input id="btnClick" class="addDown" width="50px" height="50px;" style="margin:5px;" title="Add" type="button" value="" onclick="AddNew()" />
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset style="float: left; width: 1051px; overflow: scroll;height: 255px;">
                <legend>Added List</legend>
                <table id="tbl" class="prodAddedTab">
                    <tr>
                        <th style="width: 10px;">SL</th>
                        <!-- <th style="width: 20px;">Type</th>
                        <th style="width: 10px;">Category</th>
                        <th style="width: 10px;">Sub-Category</th>
                        <th style="width: 20px;">Model</th>
                        <th style="width: 20px;">Code</th>
                        <th style="width: 20px;">Discount</th>
                        <th style="width: 20px;">Sell Qty</th> -->
                        <th> Product Name </th>
                        <th> Product Head </th>
                        <th> Product Code </th>
                        <th> Discount </th>
                        <th> Order Qty </th>
                        <th style="width: 20px;">Total</th>
                        <th style="width: 20px;">ACTION</th>
                    </tr>
                </table>
            </fieldset>
            <div id="jsPart"></div>
            <div id="formResult" class="ajaxTargetDiv"></div>
            <div id="formResultError" class="ajaxTargetDivErr"></div>
            <fieldset class="tblFooters">
                <input type="hidden" id="is_cash_order_limit">

                <?php
                echo CHtml::ajaxSubmitButton('Create', CHtml::normalizeUrl(array('sellItems/create', 'render' => true)), array(
                    'dataType' => 'json',
                    'type' => 'post',
                    'beforeSend' => 'function(){                        
                        //if($("#is_cash_order_limit").val()==1){ // more than one cash unpaid invoice
                               //alertify.error("Warning! This Distributor Have More than one Cash Unpaid Invoice!");
                              // return false;
                         // }
                            if($("#SellItems_order_dates").val()==""){
                                alertify.error("Please Select Order Date!");
                                return false;
                            }
                            if($("#SellItems_company_id option:selected").val()==""){
                                alertify.error("Please Select Company!");
                                return false;
                            }
                            if($("#SellItems_cash_due").val()==""){
                                alertify.error("Please Select Payment Type Cash or Due!");
                                return false;
                            }
                            if($("#SellItems_distributor_id").val()==""){
                                alertify.error("Please Select Distributor!");
                                return false;
                            }

                            var rowCount = document.getElementById("tbl").rows.length;
                            if(rowCount <=1){
                                alertify.error("Sorry Your Grid is Empty!");
                                return false;
                            }
                            $(".add-more-btn").attr("disabled",true).css("pointer-events","none");

                    }',
                    'success' => 'function(data) {
                     $("#ajaxLoader").hide();
                          if(data.status=="success"){
                              $("#SellItems_grand_total").val(0);
                              newArr.length=0;
                              $("#tbl tr.cartList").remove();
                              sl=0;
                              vals = [];
                              $("#orderNo").html(data.newOrderNo);
                              $("#soForReport").val(data.lastSONO);
                              $("#formResultError").hide();
                              $("#formResult").fadeIn();
                              $("#formResult").html("Data saved successfully.");
                              $("#sell-items-form")[0].reset();
                              $("#formResult").animate({opacity:1.0},1000).fadeOut("slow");
                              $("#ajaxLoaderReport").show();
                              $("#soReportDialogBox").dialog("open");
                              $("#AjFlashReportSo").html(data.soReportInfo).show();
                              $("#ajaxLoaderReport").hide();
                          }else if(data.status=="errorBalance"){
                              $("#formResultError").show();
                              $("#formResultError").html("Check Grand Total AND Available Balance!");
                          }else{
                              $("#formResultError").html("Data not saved. Please solve the above errors.");
                              $.each(data, function(key, val) {
                                  $("#sell-items-form #"+key+"_em_").html(""+val+"");
                                  $("#sell-items-form #"+key+"_em_").show();
                              });
                          }
                      }',
                ), array('class' => 'add-more-btn'));
                ?>
                <!-- <?php
                echo CHtml::ajaxLink(
                    "Preview",
                    Yii::app()->createUrl('crm/sellItems/tempSoReportOfThis'),
                    array(
                        'type' => 'POST',
                        'beforeSend' => "function(){
                         if($('#SellItems_order_dates').val()==''){
                                alertify.error('Please Select Order Date!');
                                return false;
                            }
                            if($('#SellItems_company_id option:selected').val()==''){
                                alertify.error('Please Select Company!');
                                return false;
                            }
                            if($('#SellItems_cash_due').val()==''){
                                alertify.error('Please Select Payment Type Cash or Due!');
                                return false;
                            }
                            if($('#SellItems_distributor_id').val()==''){
                                alertify.error('Please Select Distributor!');
                                return false;
                            }

                            var rowCount = document.getElementById('tbl').rows.length;
                            if(rowCount <=1){
                                alertify.error('Sorry Your Grid is Empty!');
                                return false;
                            }
                       $('#ajaxLoaderReport').show();
                     }",
                        'success' => "function( data ){
                        $('#soReportDialogBox').dialog('open');
                        $('#AjFlashReportSo').html(data).show();
                    }",
                        'complete' => "function(){
                           $('#ajaxLoaderReport').hide();
                    }",
                        'data' => array(
                            'sales_no' => 'js:jQuery("#SellItems_sales_no").val()',
                        )
                    ),
                    array(
                        'href' => Yii::app()->createUrl('crm/sellItems/tempSoReportOfThis'),
                        'class' => 'findBtn',
                        'style' => 'float: right;text-align: center; padding: 15px; color: white; background-color: #0070b5;'
                    )
                );
                ?> -->
                <div id="ajaxLoader" style="display: none; float: left;">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ajax-loader.gif" />
                </div>
            </fieldset>
        </div>
    </fieldset>
</div>
<script type="text/javascript">
    var isDiscTypePrcntg = "<?php echo $isDiscPercntg; ?>";
    $(document).ready(function() {
        $('#SellItems_overall_discount').bind('keyup', function() {
            var grossTotal = $('input.lineTotalInpt').sumValues();
            if (isDiscTypePrcntg == 1) {
                var netTotal = (grossTotal - (grossTotal * ($(this).val() / 100)));
                var discountAmount = grossTotal * ($(this).val() / 100);
            } else {
                var netTotal = (grossTotal - $(this).val());
                var discountAmount = $(this).val();
            }

            $('#SellItems_grand_total').val(netTotal.toFixed(2));
            $('#SellItems_discount_amount').val(discountAmount.toFixed(2));
        });
        $("#SellItems_si_no").css("background-color", "#D7D7D7");
        $("#SellItems_si_no").focus(function() {
            $(this).blur();
        });
        $("#SellItems_available_balance").css("background-color", "#D7D7D7");
        $("#SellItems_available_balance").focus(function() {
            $(this).blur();
        });
        $("#SellItems_grand_total").focus(function() {
            $(this).blur();
        });
    });
    var newArr = new Array();
    var grandTotal = 0;
    var grandTotalWithDiscount = 0;
    var sl = 0;
    $("#SellItems_grand_total").val(grandTotal.toFixed(2));
    $.fn.sumValues = function() {
        var sum = 0;
        this.each(function() {
            if ($(this).is(':input')) {
                var val = $(this).val();
            } else {
                var val = $(this).text();
            }
            sum += parseFloat(('0' + val).replace(/[^0-9-\.]/g, ''), 10);
        });
        return sum;
    };
    function calFnc(count) {
        $('#spInpt' + count).bind('keyup', function() {
            var sellPrc = $('#spInpt' + count).val();
            var sellQnty = $('#qtyInpt' + count).val();
            var sellDiscnt = $('#disInpt' + count).val();
            if (isDiscTypePrcntg == "1")
                var total = (sellQnty * (sellPrc - (sellPrc * (sellDiscnt / 100))));
            else
                var total = ((sellQnty * sellPrc) - sellDiscnt);
            $('#lineTtlInpt' + count).val(total);
            // $('#SellItems_grand_total').val($('input.lineTotalInpt').sumValues());
            $('#SellItems_overall_discount').val('');
        });
        $('#qtyInpt' + count).bind('keyup keypress keydown', function() {
            var sellPrc = $('#spInpt' + count).val();
            var sellQnty = $('#qtyInpt' + count).val();
            sellQnty = parseInt(sellQnty);
            var closingStock = $('#closingstock' + count).text();
            //                    if (closingStock < sellQnty || sellQnty == '' || sellQnty <= 0) {
            //                        if (closingStock < sellQnty)
            //                            alertify.error("Quantity is less than stock");
            //                        $('#qtyInpt' + count).val("");
            //                        $('#qtyInpt' + count).val("1");
            //                        return false;
            //                    }
            var sellDiscnt = $('#disInpt' + count).val();
            if (isDiscTypePrcntg == "1")
                var total = (sellQnty * (sellPrc - (sellPrc * (sellDiscnt / 100))));
            else
                var total = ((sellQnty * sellPrc) - sellDiscnt);
            $('#lineTtlInpt' + count).val(total.toFixed(2));
            $('#SellItems_grand_total').val($('input.lineTotalInpt').sumValues().toFixed(2));
            $('#SellItems_overall_discount').val('');
        });
        $('#disInpt' + count).bind('keyup', function() {
            var sellPrc = $('#spInpt' + count).val();
            var sellQnty = $('#qtyInpt' + count).val();
            var sellDiscnt = $('#disInpt' + count).val();
            if (isDiscTypePrcntg == "1")
                var total = (sellQnty * (sellPrc - (sellPrc * (sellDiscnt / 100))));
            else
                var total = ((sellQnty * sellPrc) - sellDiscnt);
            $('#lineTtlInpt' + count).val(total.toFixed(2));
            $('#SellItems_grand_total').val($('input.lineTotalInpt').sumValues().toFixed(2));
            $('#SellItems_overall_discount').val('');
        });
    }
    $("#tbl td input.rdelete").on("click", function() {
        alert("hello");
        $('#SellItems_overall_discount').val('');
        var idCounter = $(this).attr("id");
        grandTotal = $("#SellItems_grand_total").val() - $('#lineTtlInpt' + idCounter).val();
        grandTotalWithDiscount = $("#SellItems_grand_total_with_vat").val() - ($('#lineTtlInpt' + idCounter).val() + $("#discount_amount" + idCounter).val());
        $("#SellItems_grand_total").val(grandTotal.toFixed(2));
        $("#SellItems_grand_total_with_vat").val(grandTotalWithDiscount.toFixed(2));
        var srow = $(this).parent().parent();
        srow.remove();
        $("#tbl td.sno").each(function(index, element) {
            $(element).text(index + 1);
        });
        newArr[idCounter] = 0;
    });
    function deleteRows(element) {
        var result = confirm("Are you sure you want to Delete?");
        if (result) {
            var modelId = parseInt(element.parents('tr').find('.modelId').val());
            var sales_no = $('#SellItems_sales_no').val();
            var date_of_sell = $('#SellItems_order_dates').val();

            if (modelId != '') {
                $.ajax({
                    url: '<?php echo Yii::app()->createAbsoluteUrl('crm/sellItems/deleteTemporaryData') ?>',
                    cache: false,
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        modelId: modelId,
                        sales_no: sales_no,
                        date_of_sell: date_of_sell
                    },
                    success: function(data) {
                        if (data.status == "success") {
                            // $('#SellItems_overallDiscount').val('');
                            var idCounter = element.parents('tr').find('.rdelete').attr('id');
                            grandTotal = Number($("#SellItems_grand_total").val()) - Number($('#line_total' + idCounter).val());
                            var line_total_with_discount = Number($('#line_total' + idCounter).val()) - Number($("#discount_amount" + idCounter).val());
                            grandTotalWithDiscount = Number($("#SellItems_grand_total_with_discount").val() - line_total_with_discount);
                            console.log('deleting Serial ... ' + idCounter);
                            $("#SellItems_grand_total").val(grandTotal.toFixed(2));
                            $("#SellItems_grand_total_with_discount").val(grandTotalWithDiscount.toFixed(2));
                            element.parents("tr").remove();
                            $("#tbl td.sno").each(function(index, element) {
                                $(element).text(index + 1);
                            });
                            var index = vals.indexOf(modelId);
                            vals.splice(index, 1);
                            alertify.success("Item Deleted Successfully!");
                            newArr[idCounter] = 0;
                            var overall_discount = Number($("#SellItems_overallDiscount").val());
                            if(overall_discount > 0){
                                overallDiscountFunction();
                            }
                        } else {
                            console.log(modelId + "Item Not Deleted!");
                        }
                    }
                });
            }
        }
    }
    var tempQty;
    var tempSp;
    var tempDis;
    var incrmnt;
    var positionOfArrVal;
    var newQty;
    var tempQty2;
    var tempSp2;
    var tempDis2;
    var vals = [];
    function AddNew() {
        var date = $('#SellItems_order_dates').val();
        var company_id = $("#SellItems_company_id").val();
        var distributor_id = $("#SellItems_distributor_id").val()
        var grandTotalWithDiscount = Number($('#SellItems_grand_total_with_discount').val());
        var grandTotal = Number($('#SellItems_grand_total').val());
        var sellPriceOfThis = Number($("#SellItemsDetails_sell_price").val());
        var sellQty = Number($("#SellItemsDetails_sell_qty").val());
        var lineTotal = Number(sellPriceOfThis * sellQty);

        var discountPercentage = Number($('#SellItemsDetails_discount_percentage').val());
        if($('#overallDiscountEnable').val() == 1){
            var discountPercentage = Number($("#SellItems_overallDiscount").val());
        }

        var lineTotalWithDiscount = Number(lineTotal - (lineTotal * (discountPercentage / 100)));
        var discountAmount = Number(lineTotal - lineTotalWithDiscount);
        grandTotalWithDiscount = Number(grandTotalWithDiscount + lineTotalWithDiscount);
        grandTotal = Number(grandTotal + lineTotal);
        var model_id = $("#SellItemsDetails_model_id").val();
        if (date == '') {
            alertify.error("Please Select Date! ");
            return false;
        } else if (company_id == '') {
            alertify.error("Please Select Company! ");
            return false;
        } else if (distributor_id == "") {
            alertify.error("Please Select Distributor!");
            return false;
        } else if (model_id == "" || isNaN(model_id)) {
            alertify.error("Please Select Product! ");
            return false;
        } else if (sellPriceOfThis <= 0) {
            alertify.error("Sales Price Not Found! <br> Please Click on Find Button & Check Cash or Bank is selected! ");
            discount = 0;
            return false;
        } else if (sellQty <= 0 || isNaN(sellQty)) {
            alertify.error("Please Give Sell Qty To Add Product!");
            return false;
        } else {
            var chk = checkDuplicate();
            if (chk == true) {
                $('#SellItems_grand_total').val(grandTotal.toFixed(2));
                $('#SellItems_grand_total_with_discount').val(grandTotalWithDiscount.toFixed(2));
                $('#SellItemsDetails_discount_amount').val(discountAmount);
                $('#SellItemsDetails_line_total').val(lineTotal);
                $('#SellItemsDetails_line_total_with_discount').val(lineTotalWithDiscount);
                add();
                save();
                $("#SellItems_offer_or_regular").hide();
                $("#offer_or_regular").val($("#SellItems_offer_or_regular option:selected").text());
                $("#offer_or_regular").show();
                $("#SellItems_company_id").hide();
                $("#company_id").val($("#SellItems_company_id option:selected").text());
                $("#company_id").show();
                $('#SellItemsDetails_item_id option:selected').attr('selected', false);
                $('#SellItemsDetails_brand_id option:selected').attr('selected', false);
                $('#SellItemsDetails_type option:selected').attr('selected', false);
                $('#model_id_text').val('');
                $('#SellItemsDetails_code').val('');
                $('#SellItemsDetails_discount_amount').val('');
                $('#SellItemsDetails_line_total').val('');
                $('#SellItemsDetails_line_total_with_discount').val('');
                $('#SellItemsDetails_sell_price').val('').change();
                $('#SellItemsDetails_discount_percentage').val('').change();
                $('#SellItemsDetails_model_id').val('').change();
                $('#SellItemsDetails_sell_qty').val('').change();
                newArr[sl] = $("#SellItemsDetails_model_id").val() + $("#SellItems_district_id").val();

            }
        }
    }
    function add() {
        var discountOfThis = $("#SellItemsDetails_discount_percentage").val();
        var overall_discount = Number($("#SellItems_overallDiscount").val());
        var discountOfThis = 0;
        sl++;
        var slNumber = $('#tbl tr').length;
        var itemName = $("#SellItemsDetails_item_id option:selected").text();
        var brandName = $("#SellItemsDetails_brand_id option:selected").text();
        var typeName = $("#SellItemsDetails_type option:selected").text();
        var modelName = $("#model_id_text").val();
        var codeName = $("#SellItemsDetails_code").val();        
        if($('#overallDiscountEnable').val() == 1){
            var discount = overall_discount;
        }else{
            var discount = $("#SellItemsDetails_discount_percentage").val();
        }
        var sellQty = $("#SellItemsDetails_sell_qty").val();
        var sell_price = $("#SellItemsDetails_sell_price").val()
        var discount_amount = $("#SellItemsDetails_discount_amount").val();
        var line_total = Number($("#SellItemsDetails_line_total").val());
        var line_total_with_discount = Number($("#SellItemsDetails_line_total_with_discount").val());
        var name = $('#SellItemsDetails_product_name').val();
        var headName = $('#headName').val();
        var appendTxt = "<tr class='cartList'>" +
            "<input type='hidden' name='SellItemsDetails[temp_item_id][]' value='" + $("#SellItemsDetails_item_id").val() + "'>" +
            "<input type='hidden' name='SellItemsDetails[temp_brand_id][]' value='" + $("#SellItemsDetails_brand_id").val() + "'>" +
            "<input type='hidden' name='SellItemsDetails[temp_type][]' value='" + $("#SellItemsDetails_type").val() + "'>" +
            "<input type='hidden' class='modelId' name='SellItemsDetails[temp_model_id][]' value='" + $("#SellItemsDetails_model_id").val() + "'>" +
            "<input type='hidden' name='SellItemsDetails[temp_code][]' value='" + $("#SellItemsDetails_code").val() + "'>" +
            "<input type='hidden' class='temp_discount_percentage' name='SellItemsDetails[temp_discount_percentage][]' value='" + $("#SellItemsDetails_discount_percentage").val() + "'>" +
            "<input type='hidden' name='SellItemsDetails[temp_sell_price][]' value='" + $("#SellItemsDetails_sell_price").val() + "'>" +
            "<input type='hidden' name='SellItemsDetails[temp_sell_qty][]' value='" + $("#SellItemsDetails_sell_qty").val() + "'>" +
            "<input type='hidden' class='discount_amount' id='discount_amount" + sl + "' name='SellItemsDetails[temp_discount_amount][]' value='" + discount_amount + "'>" +
            "<input type='hidden' class='line_total' id='line_total" + sl + "' name='SellItemsDetails[temp_line_total][]' value='" + line_total + "'>" +
            "<input type='hidden' class='total_with_dis' name='SellItemsDetails[temp_line_total_with_discount][]' value='" + line_total_with_discount + "'>" +
            "<input class='temp_store_id' type='hidden' name='SellItems[temp_district_id][]' value='" + $("#SellItems_district_id").val() + "'>" +
            "<input class='temp_dealer_id' type='hidden' name='SellItems[temp_distributor_id][]' value='" + $("#SellItems_distributor_id").val() + "'>" +
            "<td class='sno'>" + slNumber + "</td>" +
            "<td style='text-align: center;'>" + name + "</td>" +
            "<td style='text-align: center;'>" + headName + "</td>" +
            // "<td style='text-align: center;'>" + brandName + "</td>" +
            // "<td style='text-align: center;'>" + modelName + "</td>" +
            "<td style='text-align: center;'>" + codeName + "</td>" +
            "<td style='text-align: center;' class='discount_percentage'>" + discount + "</td>" +
            "<td style='text-align: center;'>" + sellQty + "</td>" +
            "<td style='text-align: center;'>" + line_total + "</td>" +
            "<td style='text-align: center;'>" +
            "<input title=\"remove\" id='" + sl + "' type=\"button\" class=\"rdelete dltBtn\" onclick=\"deleteRows($(this))\" />" +
            "</td></tr>";
        $("#tbl tr:last").after(appendTxt);
        tempQty = $("#qtyInpt" + sl).val();
        tempSp = $("#spInpt" + sl).val();
        tempDis = $("#disInpt" + sl).val();
        if (isDiscTypePrcntg == "1")
            tempTotal = (tempQty * (tempSp - (tempSp * (tempDis / 100))));
        else
            tempTotal = ((tempQty * tempSp) - tempDis);
        $('#lineTtlInpt' + sl).val(tempTotal);
        // $('#SellItems_grand_total').val($('input.lineTotalInpt').sumValues());
        calFnc(sl);
        $(".noWidthInput").css({
            "width": "90%",
            "text-align": "center"
        });
        var isOnVal = "<?php echo $isOnVal; ?>";
        if (isOnVal == "0") {
            $(".validationInput").css("background-color", "#D7D7D7");
            $(".validationInput").focus(function() {
                $(this).blur();
            });
        }
        $(".lineTotalInpt").css("background-color", "#D7D7D7");
        $(".lineTotalInpt").focus(function() {
            $(this).blur();
        });
        $("#SellItemsDetails_code").focus();
        $('#SellItems_overall_discount').trigger('keyup');
        if(overall_discount > 0 && $('#overallDiscountEnable').val() == 1){
            overallDiscountFunction();
        }else if($('#overallDiscountEnable').val() == 0){
            lineAverageDiscountFunction();
        }
    }
    function overallDiscountEnableFunction(){
        if($("#overallDiscountEnable").val() == 0){
            $("#SellItems_overallDiscount").attr("readonly",false);
            $("#overallDiscountEnable").val(1);
            overallDiscountFunction();
        }else{
            $("#SellItems_overallDiscount").attr("readonly",true);
            $("#overallDiscountEnable").val(0);
            lineAverageDiscountFunction();
        }
    }
    function lineAverageDiscountFunction(){
        var SellItems_grand_total_with_discount = Number($("#SellItems_grand_total_with_discount").val());
        var SellItems_grand_total = Number($("#SellItems_grand_total").val());
        var dis_amount = SellItems_grand_total - SellItems_grand_total_with_discount;
        var dis_percentage = (dis_amount * 100)/SellItems_grand_total;
        $("#SellItems_overallDiscount").val(dis_percentage.toFixed(2));
        $("#SellItems_overallDiscountAmount").val(dis_amount.toFixed(2));
    }
    function overallDiscountFunction(){ 
        var overall_discount = Number($("#SellItems_overallDiscount").val());
        var inputs = $(".cartList");
        var grand_total = 0;
        var grand_total_with_discount = 0;
        var discount_amount = 0;
        $(".line_total").each(function (index, element) {
            grand_total += Number($(element).val());
            $(".discount_percentage").html(overall_discount);
            $(".temp_discount_percentage").val(overall_discount);
            var dis_amn = Number(overall_discount *  Number($(element).val()) / 100);
            $(element).siblings('.discount_amount').val(dis_amn.toFixed(2));
            $(element).siblings('.total_with_dis').val((Number($(element).val()) - dis_amn).toFixed(2));
        });
        grand_total_with_discount = grand_total - ((grand_total*overall_discount)/100);
        discount_amount = grand_total - grand_total_with_discount;
        $("#SellItems_grand_total").val(grand_total);
        $("#SellItems_grand_total_with_discount").val(grand_total_with_discount);
        $("#SellItems_overallDiscountAmount").val(discount_amount.toFixed(2));

    }
    function checkDuplicate() {
        var model_id = parseInt($("#SellItemsDetails_model_id").val());
        if (vals.indexOf(model_id) > -1) {
            alertify.error('Sorry! This Product is already added.');
            return false;
        } else {
            vals.push(model_id);
            return true;
        }
    }
</script>
<style>
    select {
        width: 86%;
    }
</style>
<?php $this->endWidget(); ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'soReportDialogBox',
    'options' => array(
        'title' => 'ORDER VOUCHER PREVIEW',
        'autoOpen' => false,
        'modal' => true,
        'position' => array(500, 40),
        'width' => 860,
        // 'height' => 'auto',
        'resizable' => false,
    ),
));
?>
<div id='AjFlashReportSo' style="display:none;"></div>
<?php $this->endWidget(); ?>
<input type="hidden" id="SellItems_closingstock" />
<script>
    $(function() {
        $("#SellItemsDetails_code").autocomplete({
            source: function(request, response) {
                var search_prodCode = request.term;
                var offer_or_regular = $("#SellItems_offer_or_regular option:selected").val();
                var company_id = $("#SellItems_company_id").val();
                var order_date = $("#SellItems_order_dates").val();
                if (order_date == '') {
                    alertify.error("Please Select Order Date!");
                    $("#SellItemsDetails_code").val("");
                    return false;
                }
                if (offer_or_regular == '') {
                    alertify.error("Please Select Offer Or Regular!");
                    $("#SellItemsDetails_code").val("");
                    return false;
                }
                if (company_id == '') {
                    alertify.error("Please Select Company!");
                    $("#SellItemsDetails_code").val("");
                    return false;
                }
                $.post('<?php echo Yii::app()->baseUrl ?>/config/prodModels/jquery_showFinishedProdCodeSearch', {
                        "search_prodCode": search_prodCode,
                        "offer_or_regular": offer_or_regular,
                        "company_id": company_id,
                        "order_date": order_date,
                        "goods_type": ""
                    },
                    function(data) {
                        response(data);
                    }, "json");
            },
            minLength: 2,
            select: function(event, ui) {
                console.log(ui);
                // $("#SellItemsDetails_code").val(ui.item.label);
                $("#SellItemsDetails_model_id").val(ui.item.value);
                // $("#model_id_text").val(ui.item.name);
                $("#SellItemsDetails_item_id").val(ui.item.item_id);
                $("#SellItemsDetails_brand_id").val(ui.item.brand_id);
                $("#SellItemsDetails_type").val(ui.item.type);
                $("#SellItemsDetails_discount_percentage").val(ui.item.discount);
                $("#SellItems_offer_id").val(ui.item.offer_id);
                $("#SellItemsDetails_sell_price").val(ui.item.sell_price);
                $("#SellItemsDetails_product_name").val(ui.item.name);
                $("#headName").val(ui.item.headName);
                $("#SellItemsDetails_code").val(ui.item.product_code);
                $("#SellItemsDetails_discount_percentage").val(ui.item.discount);
                // $("#SellItemsDetails_sell_qty").val(ui.item.stock_qty) ;
                return false;
            }
        });
    });
    $(function() {
        $("#distributor_id_text").autocomplete({
            source: function(request, response) {
                var search_distributor = request.term;
                $.post('<?php echo Yii::app()->baseUrl ?>/crm/distributor/jquery_showDistributorSearchForSellItems', {
                        "search_distributor": search_distributor
                    },
                    function(data) {
                        response(data);
                    }, "json");
            },
            minLength: 2,
            select: function(event, ui) {
                $("#distributor_id_text").val(ui.item.label);
                $("#SellItems_distributor_id").val(ui.item.value);
                $("#distributor_credit_limit").val(ui.item.credit_limit);
                $("#SellItems_available_balance").val(ui.item.available_balance);
                $("#SellItems_code_no").val(ui.item.codeNo);
                $("#SellItems_territory_id").val(ui.item.territory_id);
                $("#territory_id_text").val(ui.item.territory_name);
                $("#SellItems_area_id").val(ui.item.area_id);
                $("#areaName").val(ui.item.area_name);
                $("#SellItems_region_id").val(ui.item.region_id);
                $("#regionName").val(ui.item.region_name);
                $("#SellItems_depo_id").val(ui.item.district_id);
                $("#depoName").val(ui.item.depo_name);
                $("#SellItems_division_id").val(ui.item.division_id);
                $("#divisionName").val(ui.item.division_name);
                $("#SellItems_overallDiscount").val(ui.item.discount);
                return false;
            }
        });
    });
    $(function() {
        $("#SellItemsDetails_model_id").bind('change blur', function() {
            var model_id = $(this).val();
            if (model_id != '') {
                $.ajax({
                    url: '<?php echo Yii::app()->createAbsoluteUrl('config/prodModels/catSubCatProdOfThisModel') ?>',
                    cache: false,
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        model_id: model_id,
                        idPrefix: SellItems_
                    },
                    success: function(data) {
                        /*  $('#partyCode_text').val(data.codeNo);
                         $('#SellItems_district_id').append('<option selected value='+data.district_id+'>'+data.depoName+'</option>');
                         $('#SellItems_area_id').append('<option selected value='+data.area_id+'>'+data.area_Name+'</option>');
                         $('#SellItems_territory_id').append('<option selected value='+data.territory_id+'>'+data.territoryName+'</option>');*/
                    }
                });
            }
        });
    });
    $(function() {
        $("#SellItems_cash_due").bind('change blur', function() {
            vals = [];
            $(".cartList").empty();

        });
    });
    function save() {
        var url = "<?php echo Yii::app()->createAbsoluteUrl('crm/sellItems/saveTemporaryCrm') ?>";
        event.preventDefault(); // stopping submitting
        var form = $(this);
        var data = $("#sell-items-form").serializeArray();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data, // serializes the form's elements.
        }).done(function(response) {
            if (response.status == "success") {
                var isPresent = newArr.includes(response.id);
                if (isPresent) {
                    $("#model_id_text").val("");
                    $('#SellItemsDetails_type').val("");
                    $('#SellItemsDetails_item_id').val("");
                    $('#SellItemsDetails_brand_id').val("");
                    $("#SellItemsDetails_model_id").val("");
                    $("#SellItemsDetails_code").val("");
                    $("#SellItemsDetails_sell_price").val("");
                    $("#SellItemsDetails_discount_percentage").val("");
                    $("#SellItemsDetails_sell_qty").val("");
                    alertify.error("This Item is already added! Please try another one!");
                    console.log('This Item is already added! Please try another one!');
                } else {
                    $("#SellItems_sales_no").val(response.sales_no);
                    $("#model_id_text").val("");
                    $('#SellItemsDetails_type').val("");
                    $('#SellItemsDetails_item_id').val("");
                    $('#SellItemsDetails_brand_id').val("");
                    $("#SellItemsDetails_model_id").val("");
                    $("#SellItemsDetails_code").val("");
                    $("#SellItemsDetails_sell_price").val("");
                    $("#SellItemsDetails_discount_percentage").val("");
                    $("#SellItemsDetails_sell_qty").val("");
                    console.log('Saved Successfully!');
                    newArr[sl] = $("#SellItems_model_id").val();
                }
            } else {
                alertify.error("Please try another one!");
                $("#model_id_text").val("");
                $('#SellItemsDetails_item_id').val("");
                $('#SellItemsDetails_brand_id').val("");
                $("#SellItemsDetails_model_id").val("");
                $("#SellItemsDetails_code").val("");
                $("#SellItemsDetails_sell_price").val("");
                console.log('Please try another one!')
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            console.log(xhr.responseText);
        });
    }
</script>
<script>
    $(document).ready(function() {
        $("#SellItemsDetails_code").focus();
    });
    $(document).bind("keypress keydown keyup", "#yt0", function(e){
        if(e.keyCode == 13) { e.preventDefault(); }
    })
    function AddKeyPress(e) {
        e = e || window.event;
        if (e.keyCode == 13) {
            document.getElementById('btnClick').click();
            return false;
        }
        return true;
    }
</script>