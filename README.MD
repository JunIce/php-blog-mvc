### 通过练习书写blog,进一步了解PHP和MVC方式

[github](https://github.com/JunIce/php-blog-mvc) 喜欢的给个star

1. 分析需求

    mvc方式实现个人blog
    *  项目单入口
    *  类以命名空间的方式引入

2. 知识点

    1) spl_autoload_register

        > spl_autoload_register
        > 欲注册的自动装载函数。如果没有提供任何参数，则自动注册    autoload 的默认实现函数spl_autoload()。

        根据函数特性， 编写Loader类, 这里看出命名空间的名称和文件夹的名称有很大关系， 所以我这里采用的是命名空间名称和文件夹名称一样的，方便引入，其他方式也不是不行，具体引入标准看[PHP PSR 代码规范](https://www.cnblogs.com/woider/p/6440844.html)

        ```php
        private static function findFile($class)
        {
          // 获取顶层命名空间
          $vendor = substr($class, 0, strpos($class, '\\'));
          // 获取文件目录，默认命名空间就是目录
          $filepath = substr($class, strlen($vendor)) . '.php';
          return strtr(ROOT_PATH . $filepath, '\\', DIRECTORY_SEPARATOR);
        }
        ```
    ---

    2) trait的使用
    原谅我也是php小白，之前没怎么接触果trait这个关键字特性，具体的[trait特性](https://www.jianshu.com/p/fc053b2d7fd1)

    blog中我新建了一个ViewTrait, 方便控制器里引入获取到要渲染的模版
    ```php
    trait ViewTrait {
      protected $posts;
      public function getView($_name, $data)
      {
        $this->posts = $data; // 此处必须先赋值，否则模版里获取不到变量
        require ROOT_PATH.'Views/'.$_name.'.php';
      }
    }
    ```
    ---
    3. db的使用
    本次开发使用的是mysql PDO
    具体的不细说了。




