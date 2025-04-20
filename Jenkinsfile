pipeline {
    agent any
    environment {
        DOCKER_HOST = 'tcp://host.docker.internal:2375' // Connect to Docker Desktop daemon
    }
    stages {
        stage('Clone') {
            steps {
                git branch: 'main', url: 'https://github.com/Ryuk38/cms-test.git'
            }
        }

        stage('Build Image') {
            steps {
                sh 'docker build -t my-cms-app .'
            }
        }

        stage('Run Container') {
            steps {
                sh 'docker-compose -f docker-compose.yml up -d --build'
            }
        }

        stage('Test') {
    steps {
        script {
            sleep(10) // wait 10 seconds before making the request
sh 'curl -s -o /dev/null -w "%{http_code}" http://host.docker.internal:8085 | grep 200'
        }
    }
}

    }
}
