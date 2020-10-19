from pyresparser import ResumeParser
import pathlib
import nltk
import spacy

# nltk.download('stopwords')

path = f'{pathlib.Path.cwd()}' + '/app/Python/Sample CVs/alice_cv.pdf'
data = ResumeParser(path).get_extracted_data()

print(data)

