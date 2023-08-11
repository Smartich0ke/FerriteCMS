pipeline {
    agent {
        kubernetes {
            yaml '''
apiVersion: v1
kind: Pod
spec:
  containers:
    - name: php-tools
      image: harbor.artichokenetwork.com/library/php-tools:8.1
      command:
      - sleep
      args:
      - infinity

    - name: docker
      image: docker:latest
      command:
        - cat
      tty: true
      privileged: true
      volumeMounts:
        - name: dockersock
          mountPath: /var/run/docker.sock

  volumes:
    - name: dockersock
      hostPath:
        path: /var/run/docker.sock
'''
            defaultContainer 'php-tools'
        }
    }
    enviroment {
      COSIGN_PASSWORD=credentials('cosign-password')
      COSIGN_PRIVATE_KEY=credentials('cosign-private-key')
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
                container('docker') {
                   script {

                   sh 'apt update'
                   sh 'apt install -y cosign'

                     def app = docker.build("harbor.artichokenetwork.com/ferritecms/ferrite:latest")
                     docker.withRegistry('https://harbor.artichokenetwork.com', '453d0ba1-373f-4dd9-897f-aab4c395a1cf') {
                         app.push()
                     }

                     sh 'cosign sign --key $COSIGN_PRIVATE_KEY harbor.artichokenetwork.com/ferritecms/ferrite:latest'
                   }
                }
            }
        }

    }

}
