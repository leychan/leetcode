package string

import "strings"

func LengthOfLongestSubstring(s string) int {
	length := len(s)
	if length <= 1 {
		return length
	}

	max := 1

	right := 0

	route := ""

	for right <= length-1 {
		curChar := string(s[right])
		index := strings.Index(route, curChar)
		if index >= 0 {
			route = route[index+1:]
		}
		right++
		route = route + curChar
		max = maxFunc(max, len(route))
	}
	return max
}

func LengthOfLongestSubstring2(s string) int {
	//字符串的总长度
	length := len(s)
	if length <= 1 {
		return length
	}

	//最大子串长度
	max := 1
	//右指针
	right := 1
	//左指针
	left := 0

	for right <= length-1 {
		//当前字符
		curChar := s[right]
		//默认在[left,right)不存在与s[right]相同的字符
		index := -1
		//在[left,right)中找是否有与s[right]相同的字符
		for i := left; i < right; i++ {
			if curChar == s[i] {
				index = i
			}
		}
		//如果找到了,则left指针指向这个字符的下一个,此时由于子串长度缩短,所以不更新最大子串长度
		if index >= 0 {
			left = index + 1
		} else { //如果没找到,则更新最大子串长度
			max = maxFunc(max, right-left+1)
		}
		right++
	}
	return max
}

func maxFunc(a int, b int) int {
	if a > b {
		return a
	}
	return b
}
