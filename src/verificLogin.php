<?php
                        session_start();
                        require_once('controller/connect.php'); // Incluindo classe de conexão
                        
                        // Instanciar a classe Connect
                        $db = new Connect();
                        
                        // Obter a conexão
                        $connect = $db->getConexao();
                        

                        if (isset($_POST['log'])) {
                            $username = $_POST['email'];
                            $password = $_POST['password']; // Não Apliquei o MD5 na senha, pois nao mudei no banco ainda, mas pra deixar a senha em md5 é só colocar fazer isso md5($_POST['password'])
                            // Usar uma consulta preparada para evitar injeção de SQL
                            $stmt = $connect->prepare("SELECT * FROM `funcionario` WHERE `Email_Func` = ? AND `Senha_Func` = ?");
                            $stmt->bind_param("ss", $username, $password); // Bindando username e password
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $fetch = $result->fetch_assoc();
                                $_SESSION['user_id'] = $fetch['user_id'];
                                header("location: dashboard.php");
                                exit(); // Importante para evitar execução de código posterior
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Usuário ou senha incorretos!</div>';
                            }
                        }
                        ?>