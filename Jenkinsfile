pipeline {
    agent {
        kubernetes {
            yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
  - name: shell
    image: harbor.artichokenetwork.com/library/php-tools:8.1
    command:
    - sleep
    args:
    - infinity
'''
            // Can also wrap individual steps:
            // container('shell') {
            //     sh 'hostname'
            // }
            defaultContainer 'shell'
        }
    }
    stages {

        // Install dependencies and build the project
        stage('Build') {
            steps {
                git 'https://github.com/Smartich0ke/FerriteCMS.git'
                sh 'composer install'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        // Run unit tests
        stage('Test') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }
    }

}
