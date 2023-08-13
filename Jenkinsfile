pipeline {
    environment {
      COSIGN_PASSWORD=credentials('cosign-password')
      COSIGN_PRIVATE_KEY=credentials('cosign-private-key')
      DOCKER_TOKEN=credentials('453d0ba1-373f-4dd9-897f-aab4c395a1cf')
      DOCKER_CONTENT_TRUST="1"
      DOCKER_CONTENT_TRUST_SERVER="https://notary.artichokenetwork.com"
    }

    agent none

    stages {

        stage('Clone Repository') {
            agent {
            label 'git'
            }
            steps {
                git url: "https://github.com/Smartich0ke/FerriteCMS.git"
            }
        }

        stage('Build') {
            agent {
            label 'php-tools-8.1'
            }

            steps {
                sh 'composer install'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'

                // Build assets
                sh 'npm install'
                sh 'npm run build'
            }
        }

        stage('Test') {
            agent {
            label 'php-tools-8.1'
            }

            steps {
                sh './vendor/bin/phpunit'
            }
        }

        stage('Package') {
            agent {
            label 'docker'
            }

            steps {
                sh 'echo "$DOCKER_TOKEN_PSW" | docker login harbor.artichokenetwork.com -u $DOCKER_TOKEN_USR --password-stdin'
                sh 'docker build -t harbor.artichokenetwork.com/ferritecms/ferrite:latest .'
                sh 'docker push harbor.artichokenetwork.com/ferritecms/ferrite:latest'
            }
        }

        stage('Sign') {
            agent {
            label 'cosign'
            }

            steps {
                sh 'cosign sign --yes --key $COSIGN_PRIVATE_KEY harbor.artichokenetwork.com/ferritecms/ferrite:latest'
            }
        }
    }
}
