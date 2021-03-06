<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SettingsForm extends Form
{
    public function buildForm()
    {
        $this
            
            ->add('siteTitle', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.title')
            ])
            ->add('description', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.description')
            ])
            ->add('adminEmail', 'email', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.admin_email')
            ])
            ->add('facebook', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.facebook')
            ])
            ->add('twitter', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.twitter')
            ])
            ->add('plus', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.plus')
            ])
            ->add('pinterest', 'text', [
                'wrapper' => ['class' => 'form-group col-md-6'],
                'label' => trans('labels.fields.setting.pinterest')
            ])
            ->add('save', 'submit', [
                'label' => trans('labels.fields.save'),
                'attr' => ['class' => 'btn btn-orange']
            ]);
    }
}