<?php

namespace ElfsightYoutubeGalleryApi\Core;

class Options {
    public $Helper;

    public $apiUrl;

    public $editorSettings;

    public function __construct($Helper) {
        $this->Helper = $Helper;

        add_filter($this->Helper->getOptionName('shortcode_options'), array($this, 'shortcodeOptionsFilter'));
        add_filter($this->Helper->getOptionName('widget_options'), array($this, 'widgetOptionsFilter'));
        add_filter($this->Helper->getOptionName('editor_settings'), array($this, 'editorSettingsFilter'));
    }

    public function editorSettingsFilter($config) {
        $this->editorSettings = $config;

        $this->apiUrl = rest_url($this->Helper->getPluginSlug() . '/api');

        $this->addOptions();
        $this->modifyOptions();
        $this->deleteOptions();

        return $this->editorSettings;
    }

    public function addOptions() {
        $this->addOption(array(
            'id' => 'apiUrl',
            'tab' => 'more',
            'type' => 'hidden',
            'defaultValue' => $this->apiUrl
        ));
    }

    public function modifyOptions() {

    }

    public function deleteOptions() {

    }

    public function addOption($data) {
        if (!is_array($this->editorSettings)) {
            return;
        }

        array_push($this->editorSettings['properties'], $data);
    }

    public function modifyOption($id, $data, &$properties = null) {
        if (!isset($properties)) {
            $properties = &$this->editorSettings['properties'];
        }

        if (!is_array($properties)) {
            return;
        }

        foreach ($properties as &$property) {
            if (!empty($property['id']) && $property['id'] === $id) {
                $property = array_merge($property, $data);
            }

            if ($property['type'] === 'subgroup') {
                $this->modifyOption($id, $data, $property['subgroup']['properties']);
            }
        }
    }

    public function deleteOption($id, &$properties = null) {
        if (!isset($properties)) {
            $properties = &$this->editorSettings['properties'];
        }

        foreach ($properties as $i => &$property) {
            if ($property['type'] === 'subgroup') {
                $this->modifyOption($id, $property['subgroup']['properties']);
            }

            if (!empty($property['id']) && $property['id'] === $id) {
                array_splice($properties, $i, 1);
                return;
            }
        }
    }

    public function shortcodeOptionsFilter($options) {
        $this->apiUrl = rest_url($this->Helper->getPluginSlug() . '/api');

        if (is_array($options)) {
            $options['apiUrl'] = $this->apiUrl;
        }

        return $options;
    }

    public function widgetOptionsFilter($options_json) {
        $options = json_decode($options_json, true);

        if (is_array($options)) {
            unset($options['api']);
            unset($options['apiUrl']);
        }

        return json_encode($options);
    }
}
