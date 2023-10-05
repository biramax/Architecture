<?

require_once 'Viewer.php';
require_once 'Presenter.php';
require_once 'Model.php';
require_once 'User.php';
require_once 'AccountOwner.php';

$viewer = new Viewer();
$model = new Model();

$presenter = new Presenter($model);

$presenter->attachView($viewer);

/* Пропускаем процесс авторизации
   но предположим, что произошла авторизация пользователя с id = 4
*/

$accountOwner = new AccountOwner(4, 'Максим Бобков');

$presenter->run($accountOwner);

?>