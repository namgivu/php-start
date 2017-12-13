#!/usr/bin/env bash

: #util to create new challenge folder from template; the challenge is at https://www.hackerrank.com/challenges/YOUR-CHALLENGE_HERE

#get SCRIPT_HOME=executed script's path, containing folder, cd & pwd to get container path
s=$BASH_SOURCE ; s=$(dirname "$s") ; s=$(cd "$s" && pwd) ; SCRIPT_HOME=$s
s="$SCRIPT_HOME/../hackerrank" ; s=$(cd "$s" && pwd) ; HACKERRANK_HOME=$s

: #inputs
CHALLENGE_NAME="$1"
TEMPLATE="$2"

if [ -z $CHALLENGE_NAME ]; then
    echo 'Challenge name is required as $1 param' && exit
fi

if [ -z $TEMPLATE ]; then
    TEMPLATE="$HACKERRANK_HOME/_chYYmmDD-hhMM.challenge-title"
fi

: #clone folder from template
timestamp=$(date +%y%m%d-%H%M)
challengeFolder="$HACKERRANK_HOME/ch$timestamp.$CHALLENGE_NAME"
mkdir -p $challengeFolder && \
  cp -Rf $TEMPLATE/* $challengeFolder #copy and rename folder ref. http://www.webhostingtalk.com/showthread.php?t=909204&p=6525288#post6525288

: #put in ch name via sed ref. https://stackoverflow.com/a/525612/248616
sed -i -e "s/YOUR_CHALLENGE_HERE/$CHALLENGE_NAME/g" "$challengeFolder/main.php"

echo "
New challenge folder created at
$challengeFolder
"