<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <!-- <title><?= Html::encode($this->title) ?></title> -->
    <style type="text/css">
		.va-main {
		  /*border: 2px solid red;*/
		}

		.va-form {
		  border: 1px solid black;
		  width: 85%;
		  margin: 0 10% 0 5%;
		}

		.va-header {
		  /*border: 1px solid black;*/ 
		}

		.va-img {
		  height: 50px;
		  padding-top: 10px;
		  padding-left: 20px;
		}

		.va-hdr-label {
		  font-size: 30px;
		  float: right;
		  padding-right: 20px;
		  padding-top: 8px;
		}

		.va-hdr-address {
		  font-size: 11px;
		  float: left;
		  padding-bottom: 8px;
		  padding-top: 8px;
		  padding-left: 20px;
		}

		.va-details {
		  width: 95%;
		  padding-left: 25px;
		}
	</style>
    <?php $this->head() ?>

</head>
<body>
    <?php $this->beginBody() ?>
    <?= $content ?>

    <div class="va-main">
        <div class="va-form">
            <div class="va-header">
                <img class="va-img" src="<?= $message->embed($imageFileName); ?>">
                <b class="va-hdr-label">
                    <?= $model->appointment_code ?>
                </b>
            </div>
            <div class="va-hdr-address">
                Upper Ground 12 Cityland Pioneer Condominium 128 Pioneer St., <br>
                Mandaluyong City, Philippines
            </div>
            <div class="va-details">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'appointment_date',
                        'appointment_time',
                        'country',
                        'visa_type',
                        'client_name',
                        'city',
                        'contact_number',
                        'email_address:email',                                
                        'notes:ntext'
                    ],
                ]) ?>
            </div>
        </div>
    </div>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
