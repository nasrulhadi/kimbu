<?php

class ChartController extends Controller
{
	public function actionIndex()
	{
		if(WebUser::isAdmin() || WebUser::isClient()){
                    $this->render('index');
                }else{
                    $this->redirect(array('/'.WebUser::getModuleByRole()));
                }
	}
        
        public function actionView($id)
        {
               if(WebUser::isAdmin() || WebUser::isClient()){
                    $this->render('view');
                }else{
                    $this->redirect(array('/'.WebUser::getModuleByRole()));
                } 
        }
}