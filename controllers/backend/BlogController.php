<?php

namespace nill\blogs_category\controllers\backend;

use nill\blogs_category\models\backend\Blog;
use Yii;

/**
 * DefaultController implements the CRUD actions for BlogsCategory model.
 */
class BlogController extends \vova07\blogs\controllers\backend\DefaultController
{

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('admin-update');
        $statusArray = Blog::getStatusArray();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save(false)) {
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('danger', Module::t('blogs', 'BACKEND_FLASH_FAIL_ADMIN_UPDATE'));
                    return $this->refresh();
                }
            } elseif (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        return $this->render('update', [
                'model' => $model,
                'statusArray' => $statusArray
        ]);
    }
}
