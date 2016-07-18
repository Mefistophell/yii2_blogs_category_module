<?php

namespace nill\blogs_category\controllers\backend;

use nill\blogs_category\models\backend\Blog;
use Yii;
use nill\blogs_category\Module;

/**
 * DefaultController implements the CRUD actions for BlogsCategory model.
 */
class BlogController extends \vova07\blogs\controllers\backend\DefaultController
{

    /**
     * Update post page.
     *
     * @param integer $id Post ID
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('admin-update');
        $statusArray = Blog::getStatusArray();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate(['!category'])) {
                if ($model->save(false)) {
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('danger', Module::t('blogs_category', 'BACKEND_FLASH_FAIL_ADMIN_UPDATE'));
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

    /**
     * Create post page.
     */
    public function actionCreate()
    {
        $model = new Blog(['scenario' => 'admin-create']);
        $statusArray = Blog::getStatusArray();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save(false)) {
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('danger', Module::t('blogs', 'BACKEND_FLASH_FAIL_ADMIN_CREATE'));
                    return $this->refresh();
                }
            } elseif (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        return $this->render('create', [
                'model' => $model,
                'statusArray' => $statusArray
        ]);
    }
    
    /**
     * Find model by ID.
     *
     * @param integer|array $id Post ID
     *
     * @return \vova07\blogs\models\backend\Blog Model
     *
     * @throws HttpException 404 error if post not found
     */
    protected function findModel($id)
    {
        if (is_array($id)) {
            /** @var \vova07\blogs\models\backend\Blog $model */
            $model = Blog::findAll($id);
        } else {
            /** @var \vova07\blogs\models\backend\Blog $model */
            $model = Blog::findOne($id);
        }
        if ($model !== null) {
            return $model;
        } else {
            throw new HttpException(404);
        }
    }
}
