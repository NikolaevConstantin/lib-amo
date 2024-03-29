<?php

namespace libAmo\Request;

use libAmo\ParamsInterface;

class Params implements ParamsInterface
{
    /**
     * @var array Список значений параметров для авторизации
     */
    private $authParams = [];

    /**
     * @var array Список значений GET параметров
     */
    private $getParams = [];

    /**
     * @var array Список значений POST параметров
     */
    private $postParams = [];

    /**
     *
     */
    private $patchParams = [];

    /**
     *
     */
    private $deleteParams = [];

    /**
     * @var string|null Прокси сервер для отправки запроса
     */
    private $proxy = null;

    /**
     * Добавление прокси сервера
     *
     * @param string $proxy Прокси сервер для отправки запроса
     * @see http://php.net/manual/ru/function.curl-setopt.php
     * @return $this
     */
    public function addProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * Добавление значений параметров для авторизации
     *
     * @param string $name Название параметра
     * @param mixed $value Значение параметра
     * @return $this
     */
    public function addAuth($name, $value)
    {
        $this->authParams[$name] = $value;
        return $this;
    }

    public function addLogin($value)
    {
        $this->authParams['login'] = $value;
        return $this;
    }

    public function addDomain($value)
    {
        $this->authParams['domain'] = $value;
        return $this;
    }

    public function addApiKey($value)
    {
        $this->authParams['apiKey'] = $value;
        return $this;
    }

    public function addAccessToken($value)
    {
        $this->authParams['access_token'] = $value;
        return $this;
    }

    public function addLocale($value)
    {
        $this->authParams['locale'] = $value;
        return $this;
    }

    /**
     * Получение параметра для авторизации по ключу или список параметров
     *
     * @param string $name Название параметра
     * @return array|null Значение параметра или список параметров
     */
    public function getAuth($name = null)
    {
        if ($name !== null) {
            return isset($this->authParams[$name]) ? $this->authParams[$name] : null;
        }
        return $this->authParams;
    }

    /**
     * Добавление значений GET параметров
     *
     * @param string|array $name Название параметра
     * @param mixed $value Значение параметра
     * @return $this
     */
    public function addGet($name, $value = null)
    {
        if (is_array($name) && $value === null) {
            $this->getParams = array_merge($this->getParams, $name);
        } else {
            $this->getParams[$name] = $value;
        }
        return $this;
    }

    /**
     * Получение GET параметра по ключу или список параметров
     *
     * @param string $name Название параметра
     * @return array|null Значение параметра или список параметров
     */
    public function getGet($name = null)
    {
        if ($name !== null) {
            return isset($this->getParams[$name]) ? $this->getParams[$name] : null;
        }
        return $this->getParams;
    }

    /**
     * Получение количества GET параметров
     *
     * @return int количество GET параметров
     */
    public function hasGet()
    {
        return count($this->getParams) ? true : false;
    }

    /**
     * Очистка всех GET параметров
     *
     * @return $this
     */
    public function clearGet()
    {
        $this->getParams = [];
        return $this;
    }
    /**
     * Добавление значений POST параметров
     *
     * @param string|array $name Название параметра
     * @param mixed $value Значение параметра
     * @return $this
     */
    public function addPost($name, $value = null)
    {
        if (is_array($name) && $value === null) {
            $this->postParams = array_merge($this->postParams, $name);
        } else {
            $this->postParams[$name] = $value;
        }
        return $this;
    }

    /**
     * Добавление значений POST параметров
     *
     * @param string|array $name Название параметра
     * @param mixed $value Значение параметра
     * @return $this
     */
    public function addPatch($name, $value = null)
    {
        if (is_array($name) && $value === null) {
            $this->patchParams = array_merge($this->patchParams, $name);
        } else {
            $this->patchParams[$name] = $value;
        }
        return $this;
    }

    /**
     * Добавление значений DELETE параметров
     *
     * @param string|array $name Название параметра
     * @param mixed $value Значение параметра
     * @return $this
     */
    public function addDelete($name, $value = null)
    {
        if (is_array($name) && $value === null) {
            $this->deleteParams = array_merge($this->deleteParams, $name);
        } else {
            $this->deleteParams[$name] = $value;
        }
        return $this;
    }

    /**
     * Получение POST параметра по ключу или список параметров
     *
     * @param string $name Название параметра
     * @return array|null Значение параметра или список параметров
     */
    public function getPost($name = null)
    {
        if ($name !== null) {
            return isset($this->postParams[$name]) ? $this->postParams[$name] : null;
        }
        return $this->postParams;
    }

    /**
     * Получение Patch параметра по ключу или список параметров
     *
     * @param string $name Название параметра
     * @return array|null Значение параметра или список параметров
     */
    public function getPatch($name = null)
    {
        if ($name !== null) {
            return isset($this->patchParams[$name]) ? $this->patchParams[$name] : null;
        }
        return $this->patchParams;
    }

    /**
     * Получение DELETE параметра по ключу или список параметров
     *
     * @param string $name Название параметра
     * @return array|null Значение параметра или список параметров
     */
    public function getDelete($name = null)
    {
        if ($name !== null) {
            return isset($this->deleteParams[$name]) ? $this->deleteParams[$name] : null;
        }
        return $this->deleteParams;
    }

    /**
     * Получение количества POST параметров
     *
     * @return int количество POST параметров
     */
    public function hasPost()
    {
        return count($this->postParams) ? true : false;
    }

    /**
     * Получение количества PATH параметров
     *
     * @return int количество PATH параметров
     */
    public function hasPatch()
    {
        return count($this->patchParams) ? true : false;
    }

    /**
     * Получение количества DELETE параметров
     *
     * @return int количество DELETE параметров
     */
    public function hasDelete()
    {
        return count($this->deleteParams) ? true : false;
    }

    /**
     * Очистка всех POST параметров
     *
     * @return $this
     */
    public function clearPost()
    {
        $this->postParams = [];
        return $this;
    }

    /**
     * Очистка всех POST параметров
     *
     * @return $this
     */
    public function clearPatch()
    {
        $this->patchParams = [];
        return $this;
    }

    /**
     * Получить прокси сервер для отправки запроса
     *
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Получение возможности использования прокси сервера
     *
     * @return bool
     */
    public function hasProxy()
    {
        return is_string($this->proxy);
    }
}