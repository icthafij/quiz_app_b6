<?php

// Function to evaluate the quiz and return the score
function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;

    // Iterate through each question and compare the answer
    foreach ($questions as $index => $question) {
        if (isset($answers[$index]) && strtolower(trim($answers[$index])) === strtolower(trim($question['correct']))) {
            $score++;
        }
    }

    return $score;
}

// Define the array of questions
$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
];

// Array to store user answers
$answers = [];

// Ask the questions and collect user answers
foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\n";
    $userAnswer = readline("Your answer: ");
    $answers[] = $userAnswer;
}

// Evaluate the user's score
$score = evaluateQuiz($questions, $answers);

// Display the score
echo "\nYou scored $score out of " . count($questions) . ".\n";

// Provide feedback based on the score
if ($score === count($questions)) {
    echo "Excellent job!\n";
} elseif ($score > count($questions) / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
?>
