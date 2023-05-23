<?php
/*
 * ----------------------------------------------------------------------
 *
 *                          Borlabs Cookie
 *                    developed by Borlabs GmbH
 *
 * ----------------------------------------------------------------------
 *
 * Copyright 2018-2022 Borlabs GmbH. All rights reserved.
 * This file may not be redistributed in whole or significant part.
 * Content of this file is protected by international copyright laws.
 *
 * ----------------- Borlabs Cookie IS NOT FREE SOFTWARE -----------------
 *
 * @copyright Borlabs GmbH, https://borlabs.io
 * @author Benjamin A. Bornschein
 *
 */

namespace BorlabsCookie\Cookie\Backend;

class Icons
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
    }

    public function __clone()
    {
        trigger_error('Cloning is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserialize is forbidden.', E_USER_ERROR);
    }

    public function getAdminSVGIcon()
    {
        return 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjAiIHk9IjAiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgdmlld0JveD0iMCwgMCwgMjAsIDIwIj4KICA8ZyBpZD0iTGF5ZXJfMSI+CiAgICA8Zz4KICAgICAgPHBhdGggZD0iTTcuNzIzLDEuMTIxIEM1LjM4OSwwLjQzOSAyLjgyOSwyLjE0OCAyLjAxOSw0LjkzNiBDMi4wMTksNC45ODIgMS45OTYsNS4wMjkgMS45ODIsNS4wNzUgQzIuMzE4LDQuODUyIDIuNjg4LDQuNjg3IDMuMDc4LDQuNTg3IEMzLjc0Niw0LjQxOCA0LjQ0NCw0LjQwNSA1LjExNiw0LjU1IEM1LjQ5Miw0LjYyNSA1Ljg1OSw0Ljc0IDYuMjEsNC44OTIgQzYuNjg5LDUuMSA3LjEzOSw1LjM2NyA3LjU1LDUuNjg4IEM3LjkyMiw1LjQ3NyA4LjMxOSw1LjMxNCA4LjczMyw1LjIwNSBDOC44MDcsNC42ODMgOC45MzEsNC4xNjkgOS4xMDIsMy42NyBMOS4xMTcsMy42MzQgQzkuNDEsMy41OTQgOS43MDYsMy41NzQgMTAuMDAzLDMuNTc0IEwxMC4zMjQsMy41NzQgQzkuODgsMi40IDguOTIxLDEuNDk2IDcuNzIzLDEuMTIxIHoiIGZpbGw9IiNGRkZGRkYiLz4KICAgICAgPHBhdGggZD0iTTIuMTAyLDUuMzM2IEMtMC4wMzEsNi40OTMgLTAuNjI4LDkuNTE3IDAuNzY3LDEyLjA2NiBDMC43OTEsMTIuMTA4IDAuODE0LDEyLjE0OSAwLjgzOSwxMi4xOTEgQzAuOTE5LDExLjc5NyAxLjA2NCwxMS40MTggMS4yNjcsMTEuMDcxIEMxLjYyMSwxMC40NzkgMi4xMDQsOS45NzcgMi42ODIsOS42MDIgQzMuMDAyLDkuMzkxIDMuMzQyLDkuMjEzIDMuNjk5LDkuMDcyIEM0LjE4Myw4Ljg3OSA0LjY5MSw4Ljc1IDUuMjA5LDguNjg2IEM1LjMyMSw4LjI3NCA1LjQ4Nyw3Ljg3OSA1LjcwMiw3LjUxMSBDNS4zODgsNy4wODggNS4xMTMsNi42MzcgNC44OCw2LjE2NSBMNC44NjQsNi4xMjcgQzUuMDQzLDUuODkxIDUuMjM3LDUuNjY4IDUuNDQ3LDUuNDU5IEM1LjUyMiw1LjM4NSA1LjYsNS4zMTEgNS42NzksNS4yMjggQzQuNTMzLDQuNzE0IDMuMjE1LDQuNzU0IDIuMTAyLDUuMzM2IHoiIGZpbGw9IiNGRkZGRkYiLz4KICAgICAgPHBhdGggZD0iTTEuMTA4LDEyLjI5IEMwLjQyNSwxNC42MjUgMi4xMzUsMTcuMTg1IDQuOTIyLDE3Ljk5NSBMNS4wNjEsMTguMDMyIEM0LjgzOSwxNy42OTYgNC42NzQsMTcuMzI2IDQuNTczLDE2LjkzNSBDNC40MDQsMTYuMjY4IDQuMzkxLDE1LjU3MSA0LjUzNiwxNC44OTcgQzQuNjExLDE0LjUyMiA0LjcyNiwxNC4xNTUgNC44NzgsMTMuODAzIEM1LjA4NSwxMy4zMjUgNS4zNTMsMTIuODc1IDUuNjc0LDEyLjQ2MyBDNS40NjMsMTIuMDkyIDUuMzAxLDExLjY5NSA1LjE5LDExLjI4MiBDNC42NjgsMTEuMjA3IDQuMTU2LDExLjA4MyAzLjY1NywxMC45MTIgTDMuNjE5LDEwLjg5OCBDMy41NzksMTAuNjA0IDMuNTU5LDEwLjMwOCAzLjU1OSwxMC4wMTIgQzMuNTU5LDkuOTA3IDMuNTU5LDkuNzk5IDMuNTU5LDkuNjkgQzIuMzg3LDEwLjEzNSAxLjQ4MywxMS4wOTMgMS4xMDgsMTIuMjkgeiIgZmlsbD0iI0ZGRkZGRiIvPgogICAgICA8cGF0aCBkPSJNNS4zMjIsMTcuOTEyIEM2LjQ3OSwyMC4wNDUgOS41MDMsMjAuNjQxIDEyLjA1MiwxOS4yNDcgTDEyLjE3NywxOS4xNzUgQzExLjc4MiwxOS4wOTUgMTEuNDA0LDE4Ljk1IDExLjA1NywxOC43NDcgQzEwLjQ2NiwxOC4zOTQgOS45NjMsMTcuOTA5IDkuNTg4LDE3LjMzMSBDOS4zNzcsMTcuMDExIDkuMiwxNi42NzEgOS4wNTksMTYuMzE2IEM4Ljg2NiwxNS44MyA4LjczNiwxNS4zMjMgOC42NzIsMTQuODA1IEM4LjI2LDE0LjY5MyA3Ljg2NSwxNC41MjcgNy40OTcsMTQuMzEyIEM3LjA3NCwxNC42MjYgNi42MjMsMTQuOTAxIDYuMTUxLDE1LjEzMyBMNi4xMTQsMTUuMTUgQzUuODc3LDE0Ljk3MSA1LjY1NCwxNC43NzYgNS40NDUsMTQuNTY3IEM1LjM3MSwxNC40OTMgNS4yOTcsMTQuNDE0IDUuMjE0LDE0LjMzNSBDNC42OTksMTUuNDgxIDQuNzM5LDE2Ljc5OSA1LjMyMiwxNy45MTIgeiIgZmlsbD0iI0ZGRkZGRiIvPgogICAgICA8cGF0aCBkPSJNMTIuMjc3LDE4LjkwNyBDMTQuNjExLDE5LjU4OSAxNy4xNzEsMTcuODc5IDE3Ljk4MSwxNS4xMDMgQzE3Ljk5MywxNS4wNTcgMTguMDA0LDE1LjAxMSAxOC4wMTgsMTQuOTY0IEMxNy42ODIsMTUuMTg3IDE3LjMxMiwxNS4zNTIgMTYuOTIyLDE1LjQ1MyBDMTYuMjU0LDE1LjYyMiAxNS41NTYsMTUuNjM0IDE0Ljg4NCwxNS40ODkgQzE0LjUwOCwxNS40MTUgMTQuMTQxLDE1LjI5OSAxMy43OSwxNS4xNDcgQzEzLjMxMSwxNC45NCAxMi44NjEsMTQuNjcyIDEyLjQ1LDE0LjM1MSBDMTIuMDc4LDE0LjU2MyAxMS42ODEsMTQuNzI1IDExLjI2NywxNC44MzUgQzExLjE5MywxNS4zNTcgMTEuMDY5LDE1Ljg3IDEwLjg5OCwxNi4zNjkgTDEwLjg4MywxNi40MDYgQzEwLjU5LDE2LjQ0NiAxMC4yOTQsMTYuNDY2IDkuOTk3LDE2LjQ2NiBMOS42NzYsMTYuNDY2IEMxMC4xMjQsMTcuNjM1IDExLjA4MiwxOC41MzQgMTIuMjc3LDE4LjkwNyB6IiBmaWxsPSIjRkZGRkZGIi8+CiAgICAgIDxwYXRoIGQ9Ik0xNy44OTgsMTQuNjkyIEMyMC4wMzEsMTMuNTM1IDIwLjYyOCwxMC41MTEgMTkuMjMzLDcuOTYyIEMxOS4yMDksNy45MiAxOS4xODYsNy44NzkgMTkuMTYxLDcuODM3IEMxOS4wODEsOC4yMzEgMTguOTM2LDguNjA5IDE4LjczMyw4Ljk1NyBDMTguMzc5LDkuNTQ4IDE3Ljg5NiwxMC4wNTEgMTcuMzE4LDEwLjQyNiBDMTYuOTk4LDEwLjYzNyAxNi42NTgsMTAuODE0IDE2LjMwMSwxMC45NTYgQzE1LjgxNywxMS4xNDggMTUuMzA5LDExLjI3OCAxNC43OTEsMTEuMzQyIEMxNC42NzksMTEuNzUzIDE0LjUxMywxMi4xNDggMTQuMjk4LDEyLjUxNyBDMTQuNjEyLDEyLjk0IDE0Ljg4NywxMy4zOTEgMTUuMTIsMTMuODYzIEwxNS4xMzYsMTMuOSBDMTQuOTU3LDE0LjEzNyAxNC43NjMsMTQuMzYgMTQuNTUzLDE0LjU2OSBDMTQuNDc4LDE0LjY0MyAxNC40LDE0LjcxNyAxNC4zMjEsMTQuOCBDMTUuNDY3LDE1LjMxNCAxNi43ODUsMTUuMjc0IDE3Ljg5OCwxNC42OTIgeiIgZmlsbD0iI0ZGRkZGRiIvPgogICAgICA8cGF0aCBkPSJNMTguODUzLDcuNzM4IEMxOS41MzUsNS40MDMgMTcuODI2LDIuODQyIDE1LjA1LDIuMDMzIEwxNC45MTEsMS45OTYgQzE1LjEzNCwyLjMzMSAxNS4yOTksMi43MDIgMTUuMzk5LDMuMDkyIEMxNS41NjgsMy43NiAxNS41ODEsNC40NTcgMTUuNDM3LDUuMTMgQzE1LjM2MSw1LjUwNiAxNS4yNDcsNS44NzMgMTUuMDk0LDYuMjI1IEMxNC44ODcsNi43MDMgMTQuNjIsNy4xNTMgMTQuMjk4LDcuNTY0IEMxNC41MDksNy45MzYgMTQuNjcyLDguMzMzIDE0Ljc4Miw4Ljc0NiBDMTUuMzAzLDguODIxIDE1LjgxNyw4Ljk0NSAxNi4zMTYsOS4xMTcgTDE2LjM1Miw5LjEzIEMxNi4zOTMsOS40MjQgMTYuNDEzLDkuNzIgMTYuNDEzLDEwLjAxNiBDMTYuNDEzLDEwLjEyIDE2LjQxMywxMC4yMjkgMTYuNDEzLDEwLjMzOCBDMTcuNTgxLDkuODkgMTguNDgxLDguOTMyIDE4Ljg1Myw3LjczOCB6IiBmaWxsPSIjRkZGRkZGIi8+CiAgICAgIDxwYXRoIGQ9Ik0xNC42MDEsMi4wODggQzEzLjQ0NCwtMC4wNDUgMTAuNDIsLTAuNjQxIDcuODcxLDAuNzUzIEw3Ljc0NiwwLjgyNSBDOC4xNCwwLjkwNSA4LjUxOSwxLjA1IDguODY2LDEuMjUzIEM5LjQ1NywxLjYwNiA5Ljk2LDIuMDkxIDEwLjMzNCwyLjY2OSBDMTAuNTQ2LDIuOTg5IDEwLjcyNCwzLjMyOSAxMC44NjUsMy42ODQgQzExLjA1Nyw0LjE3IDExLjE4Nyw0LjY3NyAxMS4yNTEsNS4xOTUgQzExLjY2Miw1LjMwNyAxMi4wNTcsNS40NzMgMTIuNDI2LDUuNjg4IEMxMi44NDksNS4zNzQgMTMuMyw1LjA5OSAxMy43NzIsNC44NjcgTDEzLjgxLDQuODUgQzE0LjA0NSw1LjAyOSAxNC4yNjksNS4yMjQgMTQuNDc4LDUuNDMzIEMxNC41NTIsNS41MDcgMTQuNjI2LDUuNTg2IDE0LjcwOSw1LjY2NSBDMTUuMjIzLDQuNTE5IDE1LjE4MywzLjIwMSAxNC42MDEsMi4wODggeiIgZmlsbD0iI0ZGRkZGRiIvPgogICAgPC9nPgogIDwvZz4KPC9zdmc+Cg==';
    }
}
