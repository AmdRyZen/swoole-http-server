<?php

namespace Common\Enumeration;

class HttpCode
{
    const HTTP_OK = 1;
    const HTTP_ERROR = -1;
    const HTTP_NO_LOGIN = 401; //登录
    const HTTP_NO_AUTH = 403; //权限
}
