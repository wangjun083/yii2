Uploading Files
===============

<<<<<<< HEAD
Uploading files in Yii is usually done with the help of [[yii\web\UploadedFile]] which encapsulates each uploaded
file as an `UploadedFile` object. Combined with [[yii\widgets\ActiveForm]] and [models](structure-models.md),
you can easily implement a secure file uploading mechanism.


## Creating Models <span id="creating-models"></span>

Like working with plain text inputs, to upload a single file you would create a model class and use an attribute
of the model to keep the uploaded file instance. You should also declare a validation rule to validate the file upload.
For example,
=======
Uploading files in Yii is done via a form model, its validation rules and some controller code. Let's review what's
required to handle uploads properly.


Uploading single file
---------------------

First of all, you need to create a model that will handle file uploads. Create `models/UploadForm.php` with the following
content:
>>>>>>> official/master

```php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

<<<<<<< HEAD
class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
```

In the code above, the `imageFile` attribute is used to keep the uploaded file instance. It is associated with
a `file` validation rule which uses [[yii\validators\FileValidator]] to ensure a file with extension name `png` or `jpg`
is uploaded. The `upload()` method will perform the validation and save the uploaded file on the server.

The `file` validator allows you to check file extensions, size, MIME type, etc. Please refer to
the [Core Validators](tutorial-core-validators.md#file) section for more details.

> Tip: If you are uploading an image, you may consider using the `image` validator instead. The `image` validator is
  implemented via [[yii\validators\ImageValidator]] which verifies if an attribute has received a valid image 
  that can be then either saved or processed using the [Imagine Extension](https://github.com/yiisoft/yii2-imagine).


## Rendering File Input <span id="rendering-file-input"></span>

Next, create a file input in a view:
=======
/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
}
```

In the code above, we've created a model `UploadForm` with an attribute `file` that will become `<input type="file">` in
the HTML form. The attribute has the validation rule named `file` that uses [[yii\validators\FileValidator|FileValidator]].

### Form view

Next, create a view that will render the form:
>>>>>>> official/master

```php
<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>
=======
<?= $form->field($model, 'file')->fileInput() ?>

<button>Submit</button>
>>>>>>> official/master

<?php ActiveForm::end() ?>
```

<<<<<<< HEAD
It is important to remember that you add the `enctype` option to the form so that the file can be properly uploaded.
The `fileInput()` call will render a `<input type="file">` tag which will allow users to select a file to upload.


## Wiring Up <span id="wiring-up"></span>

Now in a controller action, write the code to wire up the model and the view to implement file uploading:
=======
The `'enctype' => 'multipart/form-data'` is necessary because it allows file uploads. `fileInput()` represents a form
input field.

### Controller

Now create the controller that connects the form and the model together:
>>>>>>> official/master

```php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
<<<<<<< HEAD
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
=======
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
>>>>>>> official/master
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
```

<<<<<<< HEAD
In the above code, when the form is submitted, the [[yii\web\UploadedFile::getInstance()]] method is called
to represent the uploaded file as an `UploadedFile` instance. We then rely on the model validation to make sure
the uploaded file is valid and save the file on the server.


## Uploading Multiple Files <span id="uploading-multiple-files"></span>

You can also upload multiple files at once, with some adjustments to the code listed in the previous subsections.

First you should adjust the model class by adding the `maxFiles` option in the `file` validation rule to limit
the maximum number of files allowed to upload. The `upload()` method should also be updated to save the uploaded files
one by one.

```php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
```

In the view file, you should add the `multiple` option to the `fileInput()` call so that the file upload field
can receive multiple files:
 
```php
<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
```

And finally in the controller action, you should call `UploadedFile::getInstances()` instead of 
`UploadedFile::getInstance()` to assign an array of `UploadedFile` instances to `UploadForm::imageFiles`. 
=======
Instead of `model->load(...)`, we are using `UploadedFile::getInstance(...)`. [[\yii\web\UploadedFile|UploadedFile]] 
does not run the model validation, rather it only provides information about the uploaded file. Therefore, you need to run the validation manually via `$model->validate()` to trigger the [[yii\validators\FileValidator|FileValidator]]. The validator expects that
the attribute is an uploaded file, as you see in the core framework code:

```php
if (!$file instanceof UploadedFile || $file->error == UPLOAD_ERR_NO_FILE) {
    return [$this->uploadRequired, []];
}
```

If the validation is successful, then we're saving the file: 

```php
$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
```

If you're using the "basic" project template, then folder `uploads` should be created under `web`.

That's it. Load the page and try uploading. Uploads should end up in `basic/web/uploads`.

Validation
----------

It's often required to adjust validation rules to accept certain files only or require uploading. Below we'll review
some common rule configurations.

### Required

If you need to make the file upload mandatory, use `skipOnEmpty` like the following:

```php
public function rules()
{
    return [
        [['file'], 'file', 'skipOnEmpty' => false],
    ];
}
```

### MIME type

It is wise to validate the type of file uploaded. FileValidator has the property `$extensions` for this purpose:

```php
public function rules()
{
    return [
        [['file'], 'file', 'extensions' => 'gif, jpg'],
    ];
}
```

By default it will validate against file content mime type corresponding to extension specified. For gif it will be
`image/gif`, for `jpg` it will be `image/jpeg`.


Note that some mime types can't be detected properly by PHP's fileinfo extension that is used by `file` validator. For
example, `csv` files are detected as `text/plain` instead of `text/csv`. You can turn off such behavior by setting
`checkExtensionByMimeType` to `false` and specifying mime types manually:

```php
public function rules()
{
    return [
        [['file'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'csv', 'mimeTypes' => 'text/plain'],
    ];
}
```

[List of common media types](http://en.wikipedia.org/wiki/Internet_media_type#List_of_common_media_types)

### Image properties

If you upload an image, [[yii\validators\ImageValidator|ImageValidator]] may come in handy. It verifies if an attribute
received a valid image that can be then either saved or processed using the [Imagine Extension](https://github.com/yiisoft/yii2-imagine).

Uploading multiple files
------------------------

If you need to upload multiple files at once, some adjustments are required.
 
Model:

```php
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 10], // <--- here!
        ];
    }
}
```

View:

```php
<?php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>

<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>

    <button>Submit</button>

<?php ActiveForm::end(); ?>
```

The difference is the following line:

```php
<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>
```

Controller:
>>>>>>> official/master

```php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
<<<<<<< HEAD
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
=======
            $model->file = UploadedFile::getInstances($model, 'file');
            
            if ($model->file && $model->validate()) {
                foreach ($model->file as $file) {
                    $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                }
>>>>>>> official/master
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
```
<<<<<<< HEAD
=======

There are two differences from single file upload. First is that `UploadedFile::getInstances($model, 'file');` is used
instead of `UploadedFile::getInstance($model, 'file');`. The former returns instances for **all** uploaded files while
the latter gives you only a single instance. The second difference is that we're doing `foreach` and saving each file.
>>>>>>> official/master
