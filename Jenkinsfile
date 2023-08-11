pipeline {
    agent {
        docker {
            image 'harbor.artichokenetwork.com/library/php-tools:8.2'
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

                // Build assets
                sh 'npm install'
                sh 'npm run build'
            }
        }

        // Run unit tests
        stage('Test') {
            steps {
                sh './vendor/bin/phpunit'
            }
        }

        // Package into a docker image
        stage('Package') {
            steps {
               script {
                 def app = docker.build("harbor.artichokenetwork.com/ferritecms/ferrite:latest")
               }
            }
        }

    }

}
