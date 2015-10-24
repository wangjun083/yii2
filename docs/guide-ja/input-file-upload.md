ファイルをアップロードする
==========================

<<<<<<< HEAD
Yii におけるファイルのアップロードは、通常、アップロードされる個々のファイルを `UploadedFile` としてカプセル化する [[yii\web\UploadedFile]] の助けを借りて実行されます。
これを [[yii\widgets\ActiveForm]] および [モデル](structure-models.md) と組み合わせることで、安全なファイルアップロードメカニズムを簡単に実装することが出来ます。


## モデルを作成する <span id="creating-models"></span>

プレーンなテキストインプットを扱うのと同じように、一つのファイルをアップロードするためには、モデルクラスを作成して、そのモデルの一つの属性を使ってアップロードされるファイルのインスタンスを保持します。
また、ファイルのアップロードを検証するために、検証規則も宣言しなければなりません。
例えば、

=======
Yii におけるファイルのアップロードは、フォームモデル、その検証規則、そして、いくらかのコントローラコードによって行われます。
アップロードを適切に処理するために何が必要とされるのか、見ていきましよう。


一つのファイルをアップロードする
--------------------------------

まず最初に、ファイルのアップロードを処理するモデルを作成する必要があります。
次の内容を持つ `models/UploadForm.php` を作成してください。
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

上記のコードにおいては、`imageFile` 属性がアップロードされたファイルのインスタンスを保持するのに使われます。
この属性が関連付けられている `file` 検証規則は、[[yii\validators\FileValidator]] を使って、`png` または `jpg` の拡張子を持つファイルがアップロードされることを保証しています。
`upload()` メソッドは検証を実行して、アップロードされたファイルをサーバに保存します。

`file` バリデータによって、ファイル拡張子、サイズ、MIME タイプなどをチェックすることが出来ます。
詳細については、[コアバリデータ](tutorial-core-validators.md#file) の節を参照してください。

> Tip|ヒント: 画像をアップロードしようとする場合は、`image` バリデータを代りに使うことを考慮しても構いません。
`image` バリデータは [[yii\validators\ImageValidator]] によって実装されており、属性が有効な画像、すなわち、保存したり [Imagine エクステンション](https://github.com/yiisoft/yii2-imagine) を使って処理したりすることが可能な有効な画像を、受け取ったかどうかを検証します。


上記のコードにおいて作成した `UploadForm` というモデルは、HTML フォームで `<input type="file">` となる `$file` という属性を持ちます。
この属性は [[yii\validators\FileValidator|FileValidator]] を使用する `file` という検証規則を持ちます。

## ファイルインプットをレンダリングする <span id="rendering-file-input"></span>

次に、ビューでファイルインプットを作成します。
=======
/**
 * UploadForm : アップロードのフォームの背後にあるモデル
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file 属性
     */
    public $file;

    /**
     * @return array 検証規則
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
}
```

上記のコードにおいて作成した `UploadForm` というモデルは、HTML フォームで `<input type="file">` となる `$file` という属性を持ちます。
この属性は [[yii\validators\FileValidator|FileValidator]] を使用する `file` という検証規則を持ちます。

### フォームのビュー

次に、フォームを表示するビューを作成します。
>>>>>>> official/master

```php
<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>送信</button>
=======
<?= $form->field($model, 'file')->fileInput() ?>

<button>送信</button>
>>>>>>> official/master

<?php ActiveForm::end() ?>
```

<<<<<<< HEAD
ファイルが正しくアップロードされるように、フォームに `enctype` オプションを追加することを憶えておくのは重要なことです。
`fileInput()` を呼ぶと `<input type="file">` のタグがレンダリングされて、ユーザがアップロードするファイルを選ぶことが出来るようになります。


## 繋ぎ合せる <span id="wiring-up"></span>

そして、コントローラアクションの中で、モデルとビューを繋ぎ合せるコードを書いて、ファイルのアップロードを実装します。
=======
ファイルのアップロードを可能にする `'enctype' => 'multipart/form-data'` は不可欠です。
`fileInput()` がフォームの入力フィールドを表します。

### コントローラ

そして、フォームとモデルを結び付けるコントローラを作成します。
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
                // ファイルのアップロードが成功
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
上記のコードでは、フォームが送信されると [[yii\web\UploadedFile::getInstance()]] メソッドが呼ばれて、アップロードされたファイルが `UploadedFile` のインスタンスとして表現されます。
そして、次に、モデルの検証によってアップロードされたファイルが有効なものであることを確かめ、サーバにファイルを保存します。


## 複数のファイルをアップロードする <span id="uploading-multiple-files"></span>

ここまでの項で示したコードに若干の修正を加えれば、複数のファイルを一度にアップロードすることも出来ます。

最初に、モデルクラスを修正して、`file` 検証規則に `maxFiles` オプションを追加して、アップロードを許可されるファイルの最大数を制限しなければなりません。
`upload()` メソッドも、アップロードされた複数のファイルを一つずつ保存するように修正しなければなりません。

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

ビューファイルでは、`fileInput()` の呼び出しに `multiple` オプションを追加して、ファイルアップロードのフィールドが複数のファイルを受け取ることが出来るようにしなければなりません。
=======
`model->load(...)` の代りに `UploadedFile::getInstance(...)` を使っています。
[[\yii\web\UploadedFile|UploadedFile]] はモデルの検証を実行せず、アップロードされたファイルに関する情報を提供するだけです。
そのため、`$model->validate()` を手作業で実行して、[[yii\validators\FileValidator|FileValidator]] を起動する必要があります。
[[yii\validators\FileValidator|FileValidator]] は、下記のコアコードが示しているように、属性がファイルであることを要求します。

```php
if (!$file instanceof UploadedFile || $file->error == UPLOAD_ERR_NO_FILE) {
    return [$this->uploadRequired, []];  // "ファイルをアップロードしてください。" というエラーメッセージ
}
```

検証が成功したら、ファイルを保存します。

```php
$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
```

「ベーシック」プロジェクトテンプレートを使っている場合は、`uploads` フォルダを `web` の下に作成しなければなりません。

以上です。ページをロードして、アップロードを試して見てください。ファイルは `basic/web/uploads` にアップロードされます。

検証
----

たいていの場合、検証規則を調整して、特定のファイルだけを受け取るようにしたり、アップロードを必須としたりする必要があります。
下記で、よく使われる規則の構成を見てみましよう。

### Required

ファイルのアップロードを必須とする必要がある場合は、次のように `skipOnEmpty` を `false` に設定します。

```php
public function rules()
{
    return [
        [['file'], 'file', 'skipOnEmpty' => false],
    ];
}
```

### MIME タイプ

アップロードされるファイルのタイプを検証することは賢明なことです。
`FileValidator` はこの目的のための `extensions` プロパティを持っています。

```php
public function rules()
{
    return [
        [['file'], 'file', 'extensions' => 'gif, jpg'],
    ];
}
```

デフォルトでは、ファイルのコンテントの MIME タイプが指定された拡張子に対応するものであるかどうかが検証されます。
例えば、`gif` に対しては `image/gif`、`jpg` に対しては `image/jpeg` であるかどうかが検証されます。

MIME タイプの中には、`file` バリデータによって使われている PHP fileinfo 拡張では適切に検知することが出来ないものがあることに注意してください。
例えば、`csv` ファイルは `text/csv` ではなく `text/plain` として検知されます。
このような振る舞いを避けるために、`checkExtensionByMimeType` を `false` に設定して、MIME タイプを手動で指定することが出来ます。

```php
public function rules()
{
    return [
        [['file'], 'file', 'checkExtensionByMimeType' => false, 'extensions' => 'csv', 'mimeTypes' => 'text/plain'],
    ];
}
```

[一般的なメディアタイプの一覧表](http://en.wikipedia.org/wiki/Internet_media_type#List_of_common_media_types)

### 画像のプロパティ

画像をアップロードするときは、[[yii\validators\ImageValidator|ImageValidator]] が重宝するでしょう。
このバリデータは、属性が有効な画像を受け取ったか否かを検証します。
画像は、保存するか、または、[Imagine エクステンション](https://github.com/yiisoft/yii2-imagine) によって処理することが出来ます。

複数のファイルをアップロードする
--------------------------------

複数のファイルを一度にアップロードする必要がある場合は、少し修正が必要になります。
 
モデル:

```php
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null ファイル属性
     */
    public $file;

    /**
     * @return array 検証規則
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 10], // <--- ここ !
        ];
    }
}
```

ビュー:
>>>>>>> official/master

```php
<?php
use yii\widgets\ActiveForm;
<<<<<<< HEAD
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>送信</button>

<?php ActiveForm::end() ?>
```

そして、最後に、コントローラアクションの中では、`UploadedFile::getInstance()` の代りに `UploadedFile::getInstances()` を呼んで、`UploadedFile` インスタンスの配列を `UploadForm::imageFiles` に代入しなければなりません。
=======

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>

<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>

    <button>送信</button>

<?php ActiveForm::end(); ?>
```

違いがあるのは、次の行です。

```php
<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>
```

コントローラ:
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
                // ファイルのアップロードが成功
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

単一のファイルのアップロードとは、二つの点で異なります。
最初の違いは、`UploadedFile::getInstance($model, 'file');` の代りに `UploadedFile::getInstances($model, 'file');` が使用されることです。
前者が一つのインスタンスを返すだけなのに対して、後者はアップロードされた **全ての** ファイルのインスタンスを返します。
第二の違いは、`foreach` によって、全てのファイルをそれぞれ保存している点です。
>>>>>>> official/master
